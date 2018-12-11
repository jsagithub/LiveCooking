<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Streams;
use App\Http\Resources\Streams as StreamsResource;

class StreamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $streams = Streams::paginate(15);

        return StreamsResource::collection($streams);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $streams = $request->isMethod('put') ? Streams::findOrFail($request->stream_id) : new Streams;
        
        $streams->id = $request->input('stream_id');
        $streams->id_user = $request->input('id_user');
        $streams->id_recepie = $request->input('id_recepie');
        $streams->stream_url = $request->input('stream_url');
       
        if ($streams->save()) {
           return new StreamsResource($streams);
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
        $streams = Streams::findOrFail($id);
        return new StreamsResource($streams);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $streams = Streams::findOrFail($id);
        if ($streams->delete()) {
            return new StreamsResource($streams);
        }  
    }
}
