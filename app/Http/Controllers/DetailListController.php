<?php

namespace App\Http\Controllers;

use App\Http\Requests\DetailListRequest;
use App\DetailList;
use App\ListPerson;

class DetailListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("DetailList.form")->with("lisn", ListPerson::all());
        
    }

    public function createid($id)
    {
        return view("DetailList.form")->with([
            'idList'=>$id, 
            'lisn'=>ListPerson::all() ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\DetailListRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DetailListRequest $request)
    {
          DetailList::create($request->all());

        session()->flash('msg','data nama list'.$request->username ."berhasil ditambahkan!");
        return redirect()->action('ListPersonController@show', ['id' => $request->list_id]);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $res= DetailList::findOrFail($id);
        session()->flash('msg','data nama list '.$res->name."berhasil dihapus!"); 
        $res->delete();
        return redirect()->action('ListPersonController@show', ['id' => $res->list_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("DetailList.form")->with([
            'lis'=>DetailList::findOrFail($id), 
            'lisn'=>ListPerson::all()
            ]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\DetailListRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DetailListRequest $request, $id)
    {   
        $res= DetailList::findOrFail($id);
        $res->update($request->all());
        session()->flash('msg','data nama list '.$res->name." berhasil diubah!"); 
        return redirect()->action('ListPersonController@show', ['id' => $res->list_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $res= DetailList::findOrFail($id);
        session()->flash('msg','data nama list '.$res->name."berhasil dihapus!"); 
        $res->delete();
        return redirect()->action('ListPersonController@show', ['id' => $res->list_id]);
    }
}
