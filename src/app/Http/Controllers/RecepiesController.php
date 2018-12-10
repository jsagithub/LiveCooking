<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Recepies;
use App\Http\Resources\Recepies as RecepiesResource;

class RecepiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recepie = Recepies::paginate(15);

        return RecepiesResource::collection($recepie);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recepie = $request->isMethod('put') ? Recepies::findOrFail($request->recepie_id) : new Recepies;
        
        $recepie->id = $request->input('recepie_id');
        $recepie->id_user = $request->input('id_user');        
        $recepie->title = $request->input('title');
        $recepie->description = $request->input('description');
        $recepie->ingridients = $request->input('ingridients');
        $recepie->nlikes = $request->input('nlikes');
        $recepie->img = $request->input('img');
        $recepie->stream_url = $request->input('stream_url');
       
        if ($recepie->save()) {
           return new RecepiesResource($recepie);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recepie = Recepies::findOrFail($id);
        return new RecepiesResource($recepie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recepie = Recepies::findOrFail($id);
        if ($recepie->delete()) {
            return new RecepiesResource($recepie);
        } 
    }
}
