<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Connect;

class BackendconnectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $connect = Connect::first();
        $data    = [
            'connect' => $connect,
        ];
        return view('backend.connect.index',$data);
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
            'phone_number' => 'required|max:20|min:10',
            'email' => 'required|max:255',
            'facebook_link' => 'max:500',
            'instagram_link' => 'max:500',
            'youtube_link'   => 'max:500',
            'whatsapp_link'  => 'max:500',
            'linkedin_link'  => 'max:500',
        ]);
        $connect_previous = Connect::first();
        $connect = new Connect;
        $connect->phone_number = $request->phone_number;
        $connect->email = $request->email;
        $connect->facebook_link = $request->facebook_link;
        $connect->instagram_link = $request->instagram_link;
        $connect->youtube_link = $request->youtube_link;
        $connect->whatsapp_link = $request->whatsapp_link;
        $connect->linkedin_link = $request->linkedin_link;
        $connect->save();

        // delete first connect
        $connect_previous->delete();
        return redirect()->route('admin.connect.index')->with('success','Data saved successfully!');
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
}
