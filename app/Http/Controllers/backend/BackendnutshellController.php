<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nutshell;

class BackendnutshellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nutshell = Nutshell::first();
        $data = [
            'nutshell' => $nutshell,
        ];
        return view('backend.nutshell.index',$data);
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
            'description' => 'required|max:1000',
            'resume_file' => 'mimetypes:application/pdf|max:5120'
        ]);
        $nutshell_previous = Nutshell::first();
        $nutshell               = new Nutshell;
        $nutshell->description  = $request->description;
        
        if($request->hasFile('resume_file')){

            $original_name          = $request->resume_file->getClientOriginalName();
            $new_name               = time().$original_name;
            $request->resume_file->move(public_path(config('global.upload_path')),$new_name);
            $nutshell->resume       = config('global.upload_path').$new_name;
        }else{
            $nutshell->resume = $nutshell_previous->resume;
        }
        $nutshell->save();
        // delete nutshell resume file
        delete_file($nutshell_previous->resume);
        $nutshell_previous->delete();
        return redirect()->route('admin.nutshell.index')->with('success','Data saved successfully!');


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
