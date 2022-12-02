<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Collectibles;
use App\Models\Collectiblesgallery;
use Illuminate\Support\Str;

class BackendcollectiblesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collectiblesgallerys = Collectiblesgallery::latest()->paginate(10);
        $data = [
            'collectiblesgallerys' => $collectiblesgallerys,
        ];
        return view('backend.collectibles.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_collectible(Request $request)
    {
        $request->validate([

            'collectible_image' => 'required|mimes:png,jpg,jpeg,svg|max:5120', //max 5mb file

        ]);
        $collectibles_previous = Collectibles::first();
        if ($request->hasFile('collectible_image')) {
            $saving_dir = public_path(config('global.upload_path'));
            $file_random_name = Str::random(20) . '.' . $request->collectible_image->getClientOriginalExtension();
            $collectible_main_image = $file_random_name;
            $collectible_thumbnail_image = "_thumb_" . $file_random_name;
            $filePath = $request->collectible_image->move($saving_dir, $collectible_main_image);
            $collectible = new Collectibles;
            $collectible->collectibles_image = config('global.upload_path') . $file_random_name;
            $collectible->save();

            // delete previous collectible
            if (!empty($collectibles_previous)) {
                delete_file($collectibles_previous->collectibles_image);
                $collectibles_previous->delete();
            }

            return redirect()->route('admin.collectibles.index')->with('success', 'Data saved successfully!!');
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => "max:255",
            'measurement' => "max:255",
            'medium' => "max:255",
            'client' => "max:255",
            'client_link' => "max:255",
            'year' => "max:10",
            'description' => "max:255",
            'youtube_video' => "max:255",
            'gallery_type' => "max:255",
            'youtube_link' => "max:255",
            'gallery_image' => 'mimes:png,jpg,jpeg,svg|max:5120', //max 5mb file
            'youtube_thumbnail_image' => 'mimes:png,jpg,jpeg,svg|max:5120', //max 5mb file

        ]);

        $view_errors = [];

        $collectiblegallerys                = new Collectiblesgallery;
        $collectiblegallerys->title         = $request->title;
        $collectiblegallerys->measurement   = $request->measurement;
        $collectiblegallerys->medium        = $request->medium;
        $collectiblegallerys->client        = $request->client;
        $collectiblegallerys->client_link   = $request->client_link;
        $collectiblegallerys->year          = $request->year;
        $collectiblegallerys->description   = $request->description;


        if ($request->gallery_type == "youtube_video") {
            if ($request->hasFile('youtube_thumbnail_image')) {

                $collectiblegallerys->gallery_type = $request->gallery_type;
                if (empty(youtube_id_extractor_from_link($request->youtube_link)['error'])) {
                    $collectiblegallerys->gallery_youtube_link = youtube_id_extractor_from_link($request->youtube_link);
                    $file_paths = youtube_thumbnail_image_save($request->file('youtube_thumbnail_image'), "/uploads/", 160, 90);
                    $collectiblegallerys->gallery_youtube_thumbnail = $file_paths['youtube_thumbnail_image'];
                } else {
                    array_push($view_errors, 'Please enter proper youtube url.');
                }
            } else {
                array_push($view_errors, 'Youtube Thumbnail is required');
            }
        } else {
            if ($request->hasFile('gallery_image')) {
                $file_paths = project_gallery_image_save($request->file('gallery_image'), "/uploads/", 160, 90);
                $collectiblegallerys->gallery_type  =  config('global.gallery_type_image');
                $collectiblegallerys->gallery_image = $file_paths['gallery_main_image'];
                $collectiblegallerys->gallery_thumbnail_image = $file_paths['gallery_thumbnail'];
            } else {
                array_push($view_errors, 'Gallery image is required.');
            }
        }

        if (empty($view_errors)) {
            $collectiblegallerys->save();
            return back()->with(['success' => 'data saved successfully']);
        }
        $data = [
            'view_errors' => $view_errors,
        ];
        return back()->with($data)->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collectiblesgallery = Collectiblesgallery::findOrFail($id);
        $data = [
            'collectiblesgallery' => $collectiblesgallery,
        ];
        return view('backend.collectibles.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $collectiblegallery                = Collectiblesgallery::findOrFail($id);

        $request->validate([
            'title' => "max:255",
            'measurement' => "max:255",
            'medium' => "max:255",
            'client' => "max:255",
            'client_link' => "max:255",
            'year' => "max:10",
            'description' => "max:255",
            'youtube_video' => "max:255",
            'gallery_type' => "max:255",
            'youtube_link' => "max:255",
            'gallery_image' => 'mimes:png,jpg,jpeg,svg|max:5120', //max 5mb file
            'youtube_thumbnail_image' => 'mimes:png,jpg,jpeg,svg|max:5120', //max 5mb file

        ]);

        $view_errors = [];

        $collectiblegallery->title         = $request->title;
        $collectiblegallery->measurement   = $request->measurement;
        $collectiblegallery->medium        = $request->medium;
        $collectiblegallery->client        = $request->client;
        $collectiblegallery->client_link   = $request->client_link;
        $collectiblegallery->year          = $request->year;
        $collectiblegallery->description   = $request->description;


        if ($request->gallery_type == "youtube_video") {

            $collectiblegallery->gallery_type = $request->gallery_type;
            if (empty(youtube_id_extractor_from_link($request->youtube_link)['error'])) {
                $collectiblegallery->gallery_youtube_link = youtube_id_extractor_from_link($request->youtube_link);
                // cheking if the youtube thumbnail is available or not
                if ($request->hasFile('youtube_thumbnail_image')) {
                    $file_paths = youtube_thumbnail_image_save($request->file('youtube_thumbnail_image'), "/uploads/", 160, 90);
                    $collectiblegallery->gallery_youtube_thumbnail = $file_paths['youtube_thumbnail_image'];
                }
            } else {
                array_push($view_errors, 'Please enter proper youtube url.');
            }
        } else {
            // checking if gallery image is available or not
            if ($request->hasFile('gallery_image')) {
                $file_paths = project_gallery_image_save($request->file('gallery_image'), "/uploads/", 160, 90);
                $collectiblegallery->gallery_type  = config('global.gallery_type_image');
                $collectiblegallery->gallery_image = $file_paths['gallery_main_image'];
                $collectiblegallery->gallery_thumbnail_image = $file_paths['gallery_thumbnail'];
            }
        }

        if (empty($view_errors)) {
            $collectiblegallery->save();
            return back()->with(['success' => 'data saved successfully']);
        }
        $data = [
            'view_errors' => $view_errors,
        ];
        return back()->with($data)->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $collectiblegallerys = Collectiblesgallery::findOrFail($id);
        if (!empty($collectiblegallerys->gallery_image)) {
            delete_file($collectiblegallerys->gallery_image);
        }
        if (!empty($collectiblegallerys->gallery_thumbnail_image)) {
            delete_file($collectiblegallerys->gallery_thumbnail_image);
        }
        if (!empty($collectiblegallerys->gallery_youtube_thumbnail)) {
            delete_file($collectiblegallerys->gallery_youtube_thumbnail);
        }
        $collectiblegallerys->delete();
        return redirect()->route('admin.collectibles.index')->with('success', 'Data deleted successfully!!');
    }
}
