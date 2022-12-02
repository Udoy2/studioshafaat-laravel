<?php
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

function project_gallery_image_save($file,$destination,$width,$height){
    $saving_dir = public_path(config('global.upload_path'));
    $original_name = $file->getClientOriginalName();
    $gallery_main_image = time().$original_name; 
    $gallery_thumbnail_image = time()."_thumb_".$original_name;

    // creating thumbnail for gallery using intervention image facades

    Image::make($file)
        ->fit(160,90)
        ->save($saving_dir.$gallery_thumbnail_image,80);

    // storing the origin file to the saving directory
    $filePath = $file->move($saving_dir,$gallery_main_image);
    // returnting file paths to save in data base or process it in controller
    $data = [
        'gallery_main_image'    => config('global.upload_path').$gallery_main_image,
        'gallery_thumbnail'     => config('global.upload_path').$gallery_thumbnail_image
    ];
    return $data;
}
function youtube_thumbnail_image_save($file,$destination,$width,$height){
    $saving_dir = public_path(config('global.upload_path'));
    $original_name = $file->getClientOriginalName();
    $youtube_thumbnail_image = time()."_thumb_".$original_name;

    // creating thumbnail for gallery using intervention image facades

    Image::make($file)
        ->fit(160,90)
        ->save($saving_dir.$youtube_thumbnail_image,80);

    // returnting file paths to save in data base or process it in controller
    $data = [
        'youtube_thumbnail_image'     => config('global.upload_path').$youtube_thumbnail_image,
    ];
    return $data;
}

function youtube_id_extractor_from_link($link){
    if(filter_var($link, FILTER_VALIDATE_URL) === FALSE){
        return ['error' => 'url is not valid'];
    }
    
    return $link;
}
function youtube_link_to_iframe($link){
    if(!empty(strpos($link,"watch?v="))){
	    $id = substr($link,strrpos($link,"=")+1,strlen($link));
    }else{
	    $id = substr($link,strrpos($link,"/")+1,strlen($link));
    }
    $youtube_iframe_link = '
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/'.$id.'"
                         title="YouTube video player" frameborder="0" id="main_image_youtube"
                         allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                    </iframe>';
    return $youtube_iframe_link;
}

function phone_number_formate($number){


    if (!empty($number)){
        $filtered_number = substr($number,-10,10);
        $main_number = '(+880)'." ".substr($filtered_number,0,4)." ".substr($filtered_number,4,3)." ".substr($filtered_number,7,3);
        return $main_number;
    }
}
function delete_file($file_path){
    $file_path = public_path($file_path);
    if(File::exists($file_path)){
        File::delete($file_path);
    }
}
?>