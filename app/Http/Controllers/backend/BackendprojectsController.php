<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Projectgallery;
use DataTables;

class BackendprojectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        $projectgallerys = Projectgallery::latest()->paginate(10);

        $data = [
            'projects' => $projects,
            'projectgallerys' => $projectgallerys,
        ];
        return view('backend.projects.index', $data);
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
            'project' => "required",
            'gallery_image' => 'mimes:png,jpg,jpeg,svg|max:5120', //max 5mb file
            'youtube_thumbnail_image' => 'mimes:png,jpg,jpeg,svg|max:5120', //max 5mb file

        ]);

        $view_errors = [];

        $projectgallerys                = new Projectgallery;
        $projectgallerys->title         = $request->title;
        $projectgallerys->measurement   = $request->measurement;
        $projectgallerys->medium        = $request->medium;
        $projectgallerys->client        = $request->client;
        $projectgallerys->client_link   = $request->client_link;
        $projectgallerys->year          = $request->year;
        $projectgallerys->description   = $request->description;
        $projectgallerys->project_id    = $request->project;


        if ($request->gallery_type == "youtube_video") {
            if ($request->hasFile('youtube_thumbnail_image')) {

                $projectgallerys->gallery_type = $request->gallery_type;
                if (empty(youtube_id_extractor_from_link($request->youtube_link)['error'])) {
                    $projectgallerys->gallery_youtube_link = youtube_id_extractor_from_link($request->youtube_link);
                    $file_paths = youtube_thumbnail_image_save($request->file('youtube_thumbnail_image'), "/uploads/", 160, 90);
                    $projectgallerys->gallery_youtube_thumbnail = $file_paths['youtube_thumbnail_image'];
                } else {
                    array_push($view_errors, 'Please enter proper youtube url.');
                }
            } else {
                array_push($view_errors, 'Youtube Thumbnail is required');
            }
        } else {
            if ($request->hasFile('gallery_image')) {
                $file_paths = project_gallery_image_save($request->file('gallery_image'), "/uploads/", 160, 90);
                $projectgallerys->gallery_type  = config('global.gallery_type_image');
                $projectgallerys->gallery_image = $file_paths['gallery_main_image'];
                $projectgallerys->gallery_thumbnail_image = $file_paths['gallery_thumbnail'];
            } else {
                array_push($view_errors, 'Gallery image is required.');
            }
        }

        if (empty($view_errors)) {
            $projectgallerys->save();
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
        $projectgallerys = ProjectGallery::findOrFail($id);
        $projects = Project::all();
        $data = [
            'projects' => $projects,
            'projectgallerys' => $projectgallerys,
        ];
        return view('backend.projects.edit', $data);
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
        $projectgallerys                = Projectgallery::findOrFail($id);

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
            'project' => "required",
            'gallery_image' => 'mimes:png,jpg,jpeg,svg|max:5120', //max 5mb file
            'youtube_thumbnail_image' => 'mimes:png,jpg,jpeg,svg|max:5120', //max 5mb file

        ]);

        $view_errors = [];

        $projectgallerys->title         = $request->title;
        $projectgallerys->measurement   = $request->measurement;
        $projectgallerys->medium        = $request->medium;
        $projectgallerys->client        = $request->client;
        $projectgallerys->client_link   = $request->client_link;
        $projectgallerys->year          = $request->year;
        $projectgallerys->description   = $request->description;
        $projectgallerys->project_id    = $request->project;


        if ($request->gallery_type == "youtube_video") {

            $projectgallerys->gallery_type = $request->gallery_type;
            if (empty(youtube_id_extractor_from_link($request->youtube_link)['error'])) {
                $projectgallerys->gallery_youtube_link = youtube_id_extractor_from_link($request->youtube_link);
                // cheking if the youtube thumbnail is available or not
                if ($request->hasFile('youtube_thumbnail_image')) {
                    $file_paths = youtube_thumbnail_image_save($request->file('youtube_thumbnail_image'), "/uploads/", 160, 90);
                    $projectgallerys->gallery_youtube_thumbnail = $file_paths['youtube_thumbnail_image'];
                }
            } else {
                array_push($view_errors, 'Please enter proper youtube url.');
            }
        } else {
            // checking if gallery image is available or not
            if ($request->hasFile('gallery_image')) {
                $file_paths = project_gallery_image_save($request->file('gallery_image'), "/uploads/", 160, 90);
                $projectgallerys->gallery_type  = config('global.gallery_type_image');
                $projectgallerys->gallery_image = $file_paths['gallery_main_image'];
                $projectgallerys->gallery_thumbnail_image = $file_paths['gallery_thumbnail'];
            }
        }

        if (empty($view_errors)) {
            $projectgallerys->save();
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
        $projectgallery = ProjectGallery::findOrFail($id);
        if (!empty($projectgallery->gallery_image)) {
            delete_file($projectgallery->gallery_image);
        }
        if (!empty($projectgallery->gallery_thumbnail_image)) {
            delete_file($projectgallery->gallery_thumbnail_image);
        }
        if (!empty($projectgallery->gallery_youtube_thumbnail)) {
            delete_file($projectgallery->gallery_youtube_thumbnail);
        }
        $projectgallery->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Data deleted successfully!!');
    }
}
