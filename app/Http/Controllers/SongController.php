<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("upload");
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
        $song = new Song();
        
        $song->title = $request->input("title");
        $song->artist = $request->input("artist");

        $song->file = $request->input('file');
        if($request->hasfile('file'))
        {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/songs/',$filename);
            $song->file = $filename;
        }

        if($request->hasfile('cover'))
        {
            $file = $request->file('cover');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/covers/',$filename);
            $song->cover = $filename;
        }

        
        $song->lyrics = $request->input("lyrics");

        $song->save();

        return redirect("dashboard")->with('status', 'Song uploaded');
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
        $song = Song::find($id);
        $tab = new Song();
        return view("edit", ["song"=>$song, "tab"=>$tab]);
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
        $song = Song::find($id);
        
        $song->title = $request->input("title");
        $song->artist = $request->input("artist");

        $song->file = $request->input('file');
        if($request->hasfile('file'))
        {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/songs/',$filename);
            $song->file = $filename;
        }

        if($request->hasfile('cover'))
        {
            $file = $request->file('cover');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/covers/',$filename);
            $song->cover = $filename;
        }

        
        $song->lyrics = $request->input("lyrics");

        $song->update();

        return redirect("song/".$id."/detail");
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
        $song = Song::find($id)->delete();
        return redirect("dashboard");
    }
}
