const youtube_checkbox = document.getElementById("select_youtube_video");
const image_upload_section = document.getElementById("image_upload_section");
const youtube_link = document.getElementById("youtube_link");
const youtube_thumbnail_image = document.getElementById(
    "youtube_thumbnail_image"
);
/**
 * functions
 */
const youtube_select_checker = (e) => {
    let state_checkbox = youtube_checkbox.checked;
    let image_upload_section_status = image_upload_section.style.display;

    if (state_checkbox) {
        image_upload_section.style.display = "none";
        youtube_link.style.display = "block";
        youtube_thumbnail_image.style.display = "block";
    } else {
        image_upload_section.style.display = "block";
        youtube_link.style.display = "none";
        youtube_thumbnail_image.style.display = "none";
    }
};
// event listeners
youtube_checkbox.addEventListener("change", youtube_select_checker);
window.addEventListener("load", youtube_select_checker);
