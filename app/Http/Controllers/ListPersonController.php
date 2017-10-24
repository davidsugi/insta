<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListPersonRequest;
use App\ListPerson;
use App\DetailList;

class ListPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
       return view("List.index")->with('res',ListPerson::all());
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("List.form");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ListPersonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ListPersonRequest $request)
    {
        ListPerson::create($request->all());

        session()->flash('msg','data list'.$request->list."berhasil ditambahkan!");
       return redirect('listpeople');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $list=ListPerson::findOrFail($id);
        $det= $list->detail_list()->get();
        return view("List.show")->with([
            'res' => $list, 
            'det' => $det
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
        return view("List.form")->with('lis',ListPerson::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ListPersonRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ListPersonRequest $request, $id)
    {
        $res= ListPerson::findOrFail($id);
        $res->update($request->all());
        session()->flash('msg','data list'.$res->list."berhasil diubah!"); 
        return redirect()->action('ListPersonController@show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res= ListPerson::findOrFail($id);
        session()->flash('msg','data tags '.$res->list."berhasil dihapus!"); 
        $res->delete();
        $res->detail_list()->delete();
        return redirect('listpeople');
    }
}
