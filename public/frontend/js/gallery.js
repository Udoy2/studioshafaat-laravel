const gallery_icon_cross = document.getElementById("gallery_icon_cross");
const fullscreen_icon = document.getElementById("fullscreen_icon");
const gallery = document.getElementById("gallery");
const gallery_main_image = document.getElementById("gallery_main_image");
const gallery_thumbnail_container = document.getElementById(
    "gallery_thumbnail_container"
);
const gallery_zoom_in = document.getElementById("gallery_zoom_in");
const gallery_zoom_out = document.getElementById("gallery_zoom_out");
const gallery_share = document.getElementById("gallery_share");
const share_container = document.getElementById("share_container");
const gallery_share_facebook = document.getElementById(
    "gallery_share_facebook"
);
const gallery_share_whatsapp = document.getElementById(
    "gallery_share_whatsapp"
);
const gallery_share_linkendin = document.getElementById(
    "gallery_share_linkendin"
);
const gallery_navigation_counter = document.getElementById(
    "gallery_navigation_counter"
);

// gallery information references
const gallery_title = document.getElementById("gallery-title");
const gallery_description = document.getElementById("gallery-description");
const gallery_measurement = document.getElementById("gallery-measurement");
const gallery_medium = document.getElementById("gallery-medium");
const gallery_client = document.getElementById("gallery-client");
const gallery_year = document.getElementById("gallery-year");
const client_link_placeholder = document.getElementById(
    "client_link_placeholder"
);

// variables
let zoom_percent = 1;
let zoom_step = 0.2;
var slider_gallery_slider;
var main_image;
var current_share_link;

/**
 * functions
 */
const image_path_to_true_path = (path) => {
    $new_path = `${window.location.origin}${path}`;
    return $new_path;
};
const image_loader = (image_element, image_link, type) => {
    var loader_image = new Image();
    switch (type) {
        // case-backgroundImage for loading image in style.bacnground-image
        case "backgroundImage":
            loader_image.onload = function () {
                image_element.style.backgroundImage = `url(${this.src})`;
            };
            break;
        // case-imageTag for loading image in image tag src attribute
        case "imageTag":
            loader_image.onload = function () {
                image_element.src = this.src;
            };
        default:
            break;
    }
    loader_image.src = image_link;
};
const set_information_in_gallery = (element) => {
    let gallery_data_title = element.getAttribute("data-title");
    let gallery_data_description =
        element.getAttribute("data-description") == "null"
            ? " "
            : element.getAttribute("data-description");
    let gallery_data_measurement =
        element.getAttribute("data-measurement") == "null"
            ? " "
            : element.getAttribute("data-measurement");
    let gallery_data_medium =
        element.getAttribute("data-medium") == "null"
            ? " "
            : element.getAttribute("data-medium");
    let gallery_data_year =
        element.getAttribute("data-year") == "null"
            ? " "
            : element.getAttribute("data-year");

    if (element.getAttribute("data-client_link") != "null") {
        client_link_placeholder.innerHTML = `<a href="${element.getAttribute(
            "data-client_link"
        )}" id="gallery-client_link" target="_blank"
                                        style="text-decoration: none;color:white;" rel="noopener noreferrer">${element.getAttribute(
                                            "data-client"
                                        )}</a>`;
    } else {
        client_link_placeholder.innerHTML = `<span style="text-decoration: none;color:white;">${element.getAttribute(
            "data-client"
        )} </span> `;
    }
    // adding image info in gallery
    gallery_title.innerHTML = gallery_data_title;
    gallery_description.innerText = gallery_data_description;
    gallery_measurement.innerText = gallery_data_measurement;
    gallery_medium.innerText = gallery_data_medium;
    gallery_year.innerText = gallery_data_year;
    current_share_link     = element.getAttribute("share_link");
};
const remove_information_in_gallery = () => {
    // remove info in gallery
    gallery_title.innerHTML = "";
    gallery_description.innerText = "";
    gallery_measurement.innerText = "";
    gallery_medium.innerText = "";
    client_link_placeholder.innerHTML = "";
    gallery_year.innerText = "";
};
const thumbnail_selected_style_add = (element) => {
    // adding selected style in thumbnail
    element.style.transform = `scale(0.8)`;
    element.style.outline = `5px solid #707070`; //#707070 is secondary color in css
};
const element_style_remove = (elements, ...styles) => {
    if (NodeList.prototype.isPrototypeOf(elements)) {
        //check if its a collection of elements
        styles.forEach((styleName) => {
            elements.forEach((currElem) => {
                currElem.style[styleName] = "";
            });
        });
    } else {
        styles.forEach((styleName) => {
            elements.style[styleName] = "";
        });
    }
};

const gallery_thumbnail_template = (
    gallery_response,
    forEach_counter,
    gallery_content_length,
    default_selected_thumbnail_number,
    project_id,
    gallery_type
) => {
    /**
         * `<div class="image_thumbnail_wrapper">
                    <div class="image_thumbnail" style="background: url(http://127.0.0.1:8000/uploads/1629916360_thumb_cornerstone.png)"
                        data-mainImage="./assets/images/gallery_1.jpg"></div>
                </div>`
         */
    let thumbnail_wrapper = document.createElement("div");
    thumbnail_wrapper.classList.add("image_thumbnail_wrapper");
    let image_thumbnail = document.createElement("div");
    image_thumbnail.classList.add("image_thumbnail");
    image_thumbnail.setAttribute("data-thumbnail_counter", forEach_counter);
    image_thumbnail.setAttribute(
        "data-gallery_content_length",
        gallery_content_length
    );
    image_thumbnail.addEventListener("click", gallery_main_image_toggle);

    // information data adding in data- attributes
    image_thumbnail.setAttribute("data-title", gallery_response.title);
    image_thumbnail.setAttribute(
        "data-description",
        gallery_response.description
    );
    image_thumbnail.setAttribute(
        "data-measurement",
        gallery_response.measurement
    );
    image_thumbnail.setAttribute("data-medium", gallery_response.medium);
    image_thumbnail.setAttribute("data-client", gallery_response.client);
    image_thumbnail.setAttribute(
        "data-client_link",
        gallery_response.client_link
    );
    image_thumbnail.setAttribute("data-year", gallery_response.year);
    if (gallery_type === "projects_gallery") {
        // share link
        image_thumbnail.setAttribute("share_link", encodeURIComponent(
            `${window.location.origin}/project?project=${project_id}&gallery=${forEach_counter}`
        ));
    } else {
        // share link
        image_thumbnail.setAttribute("share_link",encodeURIComponent(
            `${window.location.origin}/collectible?project=${project_id}&gallery=${forEach_counter}`
        ));
    }
    //storing link in global variable
    

    // checking if gallery type is youtube video of gallery image
    if (gallery_response.gallery_type == "youtube_video") {
        // loading thumbnail image of youtube video
        image_loader(
            image_thumbnail,
            image_path_to_true_path(gallery_response.gallery_youtube_thumbnail),
            "backgroundImage"
        );
        image_thumbnail.setAttribute(
            "data-gallery_type",
            gallery_response.gallery_type
        );
        image_thumbnail.setAttribute(
            "data-gallery_youtube_link",
            gallery_response.gallery_youtube_link
        );
        thumbnail_wrapper.appendChild(image_thumbnail);

        // adding selected thumbnail element if foreach is in 1
        if (forEach_counter == default_selected_thumbnail_number) {
            setTimeout(() => {
                gallery_main_image.innerHTML =
                    gallery_response.gallery_youtube_link;
            }, 350);
            // set information in gallery
            set_information_in_gallery(image_thumbnail);
            thumbnail_selected_style_add(image_thumbnail);
            gallery_navigation_counter.innerText = `${forEach_counter}/${gallery_content_length}`;
        }
        return thumbnail_wrapper;
    } else {
        // loading thumbnail image of gallery main image
        image_loader(
            image_thumbnail,
            image_path_to_true_path(gallery_response.gallery_thumbnail_image),
            "backgroundImage"
        );
        image_thumbnail.setAttribute(
            "data-gallery_type",
            gallery_response.gallery_type
        );
        image_thumbnail.setAttribute(
            "data-mainImage",
            image_path_to_true_path(gallery_response.gallery_image)
        );
        thumbnail_wrapper.appendChild(image_thumbnail);

        // adding selected thumbnail element if foreach is in 1
        if (forEach_counter == default_selected_thumbnail_number) {
            // gallery_main_image.innerHTML = `<img src="${gallery_response.gallery_image}" class="main_image" alt="" id="main_image" />`;
            main_image = document.createElement("img"); //main image variable can be found in project.js
            main_image.classList.add("main_image");
            main_image.id = "main_image";

            image_loader(
                main_image,
                image_path_to_true_path(gallery_response.gallery_image),
                "imageTag"
            );
            gallery_main_image.innerHTML = "";
            gallery_main_image.append(main_image);
            // set information in gallery
            set_information_in_gallery(image_thumbnail);
            thumbnail_selected_style_add(image_thumbnail);
            gallery_navigation_counter.innerText = `${forEach_counter}/${gallery_content_length}`;
            
        }
        return thumbnail_wrapper;
    }
};

const gallery_thumbnail_element_create = (
    gallery_responses,
    default_selected_thumbnail_number,
    project_id,
    gallery_type
) => {
    let gallery_content_length = gallery_responses.length;
    let forEach_counter = 1;
    gallery_responses.forEach((gallery_response) => {
        $gallery_thumbnails = gallery_thumbnail_template(
            gallery_response,
            forEach_counter,
            gallery_content_length,
            default_selected_thumbnail_number,
            project_id,
            gallery_type
        );
        gallery_thumbnail_container.appendChild($gallery_thumbnails);
        forEach_counter++;
    });
    slider_gallery_slider = $(".slider_gallery_slider").lightSlider({
        item: 5,
        loop: false,
        slideMove: 1,
        easing: "cubic-bezier(0.25, 0, 0.25, 1)",
        speed: 600,
        slideMargin: 10,
        enableTouch: false,
        responsive: [
            {
                breakpoint: 800,
                settings: {
                    item: 4,
                    slideMove: 1,
                    slideMargin: 6,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    item: 4,
                    slideMove: 1,
                },
            },
        ],
    });
};

/**
 * callback functions
 */
const gallery_close = () => {
    gallery.classList.remove("open");
    // removing thumbnails after the gallery is closed
    setTimeout(() => {
        slider_gallery_slider.destroy(); //slider_gallery_sider variable created at project.js file

        gallery_thumbnail_container.innerHTML = ""; //image thumbnail variable can be found in projects.js file
        gallery_main_image.innerHTML = "";
        // removing image informations from gallery
        remove_information_in_gallery();
    }, 500);
};

const fullscreen_toggle = () => {
    const fullscreenElement =
        document.fullscreenElement || document.webkitfullscreenElement;
    if (!fullscreenElement) {
        if (gallery_main_image.requestFullscreen) {
            gallery_main_image.requestFullscreen();
        } else if (gallery_main_image.webkitRequestFullscreen) {
            gallery_main_image.webkitRequestFullscreen();
        }
    } else {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.webkitExitFullscreen) {
            document.webkitExitFullscreen();
        }
    }
};

const gallery_main_image_toggle = (e) => {
    // set information in gallery
    set_information_in_gallery(e.target);

    if (e.target.getAttribute("data-gallery_type") == "image_gallery") {
        main_image = document.createElement("img"); //main image variable can be found in project.js
        main_image.classList.add("main_image");
        main_image.id = "main_image";

        const mainImageLink = e.target.getAttribute("data-mainImage");
        // image loader
        image_loader(main_image, mainImageLink, "imageTag");
        gallery_main_image.innerHTML = "";
        gallery_main_image.append(main_image);
    } else {
        const gallery_youtube_link = e.target.getAttribute(
            "data-gallery_youtube_link"
        );
        gallery_main_image.innerHTML = "";
        gallery_main_image.innerHTML = gallery_youtube_link;
    }

    // reference of all thumbnails
    const gallery_thumbnails = document.querySelectorAll(".image_thumbnail");
    // removes scale and outline style from other thumbnails
    element_style_remove(gallery_thumbnails, "transform", "outline");
    // removing scale from main image
    try {
        element_style_remove(main_image, "transform");
    } catch (e) {}
    // changing zoom_percent to default
    zoom_percent = 1;

    thumbnail_selected_style_add(e.target);
    let gallery_count = e.target.getAttribute("data-thumbnail_counter");
    let gallery_content_length = e.target.getAttribute(
        "data-gallery_content_length"
    );
    gallery_navigation_counter.innerText = `${gallery_count}/${gallery_content_length}`;
};

const gallery_zoom_toggle = (state) => {
    if (state == "zoom_in") {
        if (zoom_percent <= 3) {
            zoom_percent += zoom_step;
            main_image.style.transform = `scale(${zoom_percent})`;
        }
    } else {
        if (zoom_percent >= 1) {
            zoom_percent -= zoom_step;
            main_image.style.transform = `scale(${zoom_percent})`;
        }
    }
};

const gallery_share_toggle = (e) => {
    if (e.target.classList.contains("share_wrapper")) {
        share_container.classList.remove("open");
        return;
    }
    share_container.classList.add("open");
};

const gallery_social_share = (share_type) => {
    let post_title = "Title";
    if (share_type == "facebook") {
        let post_url = `https://www.facebook.com/sharer/sharer.php?u=${current_share_link}`;
        window.open(post_url);
    }
    if (share_type == "whatsapp") {
        let post_url = `https://api.whatsapp.com/send?phone=&text=${current_share_link}`;
        window.open(post_url);
    }
    if (share_type == "linkendin") {
        let post_url = `https://www.linkedin.com/shareArticle?url=${current_share_link}&title=${post_title}`;
        window.open(post_url);
    }
};

// event listener
gallery_icon_cross.addEventListener("click", gallery_close);
fullscreen_icon.addEventListener("click", fullscreen_toggle);
gallery_zoom_in.addEventListener("click", () => gallery_zoom_toggle("zoom_in"));
gallery_zoom_out.addEventListener("click", () =>
    gallery_zoom_toggle("zoom_out")
);
gallery_main_image.addEventListener("doubleclick", fullscreen_toggle);
gallery_share.addEventListener("click", gallery_share_toggle);
share_container.addEventListener("click", gallery_share_toggle);
gallery_share_facebook.addEventListener("click", () =>
    gallery_social_share("facebook")
);
gallery_share_whatsapp.addEventListener("click", () =>
    gallery_social_share("whatsapp")
);
gallery_share_linkendin.addEventListener("click", () =>
    gallery_social_share("linkendin")
);
