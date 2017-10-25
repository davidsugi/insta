<?php

namespace App\Http\Controllers;

use App\Http\Requests\MediaRequest;
use Illuminate\Http\Request;

use App\Media;
use App\Tags;
use App\ListPerson;
use App\DetailList;

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
        if($request->key!=env("AUTH_KEY_API")){
            return response()->json(['error'=> "unauthenticated"], 401);
        }
        $medias= new Media;

        if($request->exclude_list){
            $listn = ListPerson::where('list',$request->exclude_list)->first();
            if(!$listn){
                return response()->json(['error'=> "list not found"], 404);
            }
            $det = DetailList::where('list_id',$listn->id)->get();
            $ex = $det->pluck('username');
            $medias =$medias->whereNotIn('username', $ex);
        }
        if($request->tag){
            $tag= Tags::where('tag',$request->tag)->first();

            if($tag){
               $medias= $medias->where('tag_id',$tag->id);
            }
           else{
                return response()->json(['error'=> "Tag not found"], 404);
           }
            
        }
        if($request->sort){
            $medias= $medias->orderBy($request->sort, "desc");
        }
        if($request->max){
            $medias= $medias->limit($request->max);
        }
        if($request->maxDate){
            $medias= $medias->where('date','<',$request->maxDate);
        }
        if($request->minDate){
            $medias= $medias->where('date','>',$request->minDate);
        }
        $medias= $medias->get();
        
        if(empty($medias))
          return []; 

        return $medias;
        
    }
}
