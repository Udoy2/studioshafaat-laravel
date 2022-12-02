/**
 * references
 */

const cards = document.querySelectorAll(".card_column--card");

/**
 * variables
 */
let default_selected_thumbnail_number = 1;
gallery_type = "projects_gallery";

/**
 * functions
 */

/**
 * callback functions
 */
// project page gallery popup controller function
const gallery_open = async (project_id) => {
    let gallery_request_link = `${window.location.origin}/project_gallery_response/${project_id}`;
    try {
        let gallery_data_request = await fetch(gallery_request_link);
        let gallery_responses = await gallery_data_request.json();
        gallery_thumbnail_element_create(
            gallery_responses,
            default_selected_thumbnail_number,
            project_id,
            gallery_type
        ); //this function is defined in gallery.js
        gallery.classList.add("open");
    } catch (error) {
        alert("Connection Error!");
    }
};

/**
 * Event listeners
 */

cards.forEach((card) => {
    let project_id = card.getAttribute("data-project_id");
    card.addEventListener("click", () => gallery_open(project_id));
});

window.addEventListener("load", async () => {
    $current_url = window.location.href;
    $url_obj = new URL($current_url);
    let project_id = $url_obj.searchParams.get("project");
    let default_selected_thumbnail_number =
        $url_obj.searchParams.get("gallery");
    if (project_id && default_selected_thumbnail_number) {
        let gallery_request_link = `${window.location.origin}/project_gallery_response/${project_id}`;

        try {
            let gallery_data_request = await fetch(gallery_request_link);
            let gallery_responses = await gallery_data_request.json();
            gallery_thumbnail_element_create(
                gallery_responses,
                default_selected_thumbnail_number,
                project_id,
                gallery_type
            ); //this function is defined in gallery.js
            gallery.classList.add("open");
        } catch (error) {
            alert("Connection Error!");
        }
    }
});
