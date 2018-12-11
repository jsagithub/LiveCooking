<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Stars;
use App\Http\Resources\Stars as StarsResource;

class StarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stars = Stars::paginate(15);

        return StarsResource::collection($stars);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stars = $request->isMethod('put') ? Stars::findOrFail($request->stars_id) : new Stars;
        
        $stars->id = $request->input('stars_id');
        $stars->id_user = $request->input('id_user');
        $stars->nstars = $request->input('nstars');
       
        if ($stars->save()) {
           return new StarsResource($stars);
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
        $stars = Stars::findOrFail($id);
        return new StarsResource($stars);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stars = Stars::findOrFail($id);
        if ($stars->delete()) {
            return new StarsResource($stars);
        }
    }
}
