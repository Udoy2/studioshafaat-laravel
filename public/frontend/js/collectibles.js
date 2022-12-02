/**
 * references
 */

const cards = document.querySelectorAll(".card_column--card");
const collectibles_gallery_open = document.querySelectorAll(
    ".collectibles_gallery_open"
);

/**
 * variables
 */
let default_selected_thumbnail_number = 1;
/**
 * functions
 */

/**
 * callback functions
 */
// project page gallery popup controller function
const gallery_open = async (project_id) => {
    let gallery_request_link = `${window.location.origin}/collectible_gallery_response`;
    try {
        let gallery_data_request = await fetch(gallery_request_link);
        let gallery_responses = await gallery_data_request.json();
        gallery_type = "collectibles_gallery";
        gallery_thumbnail_element_create(
            gallery_responses,
            default_selected_thumbnail_number,
            project_id,
            gallery_type
        ); //this function is defined in gallery.js
        gallery.classList.add("open");
    } catch (error) {
        throw error;
    }
};

/**
 * Event listeners
 */

collectibles_gallery_open.forEach((single_button) => {
    single_button.addEventListener("click", () => gallery_open(0));
});

window.addEventListener("load", async () => {
    $current_url = window.location.href;

    $url_obj = new URL($current_url);
    let project_id = $url_obj.searchParams.get("project");
    let default_selected_thumbnail_number =
        $url_obj.searchParams.get("gallery");
    if (project_id && default_selected_thumbnail_number) {
        let gallery_request_link = `${window.location.origin}/collectible_gallery_response`;

        try {
            let gallery_data_request = await fetch(gallery_request_link);
            let gallery_responses = await gallery_data_request.json();
            gallery_type = "collectibles_gallery";
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
