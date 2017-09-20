<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Media;
use App\Tags;
use Carbon\Carbon;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Tag.index")->with('res',Tags::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Tag.form");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        $request['last_upd']=Carbon::now();

        Tags::create($request->all());

        session()->flash('msg','data tags'.$request->tag."berhasil ditambahkan!");
       return redirect('tags');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag=Tags::findOrFail($id);
        $med= $tag->medias()->get();
        return view("Tag.show")->with([
            'res' => $tag, 
            'med' => $med
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("Tag.form")->with('tagres',Tags::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, $id)
    {
        $res= Tags::findOrFail($id);
        $res->update($request->all());
        session()->flash('msg','data tag'.$res->tag."berhasil diubah!"); 
        return redirect()->action('TagsController@show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res= Tags::findOrFail($id);
        session()->flash('msg','data domain'.$res->tag."berhasil diubah!"); 
        $res->delete();
        return redirect('tags');
    }

     public function updateTag($id)
    {
        $res= Tags::findOrFail($id);
        $res->update($request->all());
        session()->flash('msg','data tag'.$res->tag."berhasil diubah!"); 
        return redirect()->action('TagsController@show', ['id' => $id]);
    }
}
