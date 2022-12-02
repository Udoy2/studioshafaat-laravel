<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Collectiblesgallery;
use App\Models\Collectibles;

class CollectiblesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collectibles = Collectibles::first();
        $data = [
            'collectibles' => $collectibles,
        ];
        return view('frontend.collectibles', $data);
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function collectible_gallery_response()
    {
        $collectibleGallerys = Collectiblesgallery::latest()->get();
        foreach ($collectibleGallerys as $collectibleGallery) {
            # code...
            if ($collectibleGallery->gallery_type == 'youtube_video') {
                $collectibleGallery->gallery_youtube_link = youtube_link_to_iframe($collectibleGallery->gallery_youtube_link);
            }
        }

        return response()->json($collectibleGallerys);
    }
}
