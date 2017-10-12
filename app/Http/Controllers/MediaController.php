<?php

namespace App\Http\Controllers;

use App\Http\Requests\MediaRequest;
use Illuminate\Http\Request;

use App\Media;
use App\Tags;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
    {
        $this->middleware('auth')->except('api_index');
    }
    
    public function index()
    {
        return view("Media.index")->with('res',Media::all());
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
    public function store(MediaRequest $request)
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
        return view("Media.show")->with('res',Media::findOrFail($id));
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
    public function update(MediaRequest $request, $id)
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

    public function api_index(request $request)
    {
        if($request->key=="xyFp8ZxJ2s"){
           $medias= new Media;
        if($request->tag){
            $tag= Tags::where('tag',$request->tag)->first();
            if($tag){
               $medias= $medias->where('tag_id',$tag->id);
            }
           else{return [];}
            
        }
        if($request->sort){
            $medias= $medias->orderBy($request->sort, "desc");
        }
        if($request->max){
            $medias= $medias->limit($request->max);
        }
        $medias= $medias->get();
        
        if(empty($medias))
          return []; 

        return $medias;
         
        }
        else{
            return [];
        }
        
        
        # notes_copy_db(from_database_name, to_database_name)e...
    }
}
