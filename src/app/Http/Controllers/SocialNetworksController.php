<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\SocialNetworks;
use App\Http\Resources\SocialNetworks as SocialNetworksResource;

class SocialNetworksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $social = SocialNetworks::paginate(15);

        return SocialNetworksResource::collection($social);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $social = $request->isMethod('put') ? SocialNetworks::findOrFail($request->social_id) : new SocialNetworks;
        
        $social->id = $request->input('social_id');
        $social->id_user = $request->input('id_user');
        $social->social_network = $request->input('social_network');
        $social->social_url = $request->input('social_url');
       
        if ($social->save()) {
           return new SocialNetworksResource($social);
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
        $social = SocialNetworks::findOrFail($id);
        return new SocialNetworksResource($social);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $social = SocialNetworks::findOrFail($id);
        if ($social->delete()) {
            return new SocialNetworksResource($social);
        }  
    }
}
