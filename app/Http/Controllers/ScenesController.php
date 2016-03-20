<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scene;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Thumbnail;

class ScenesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['scenes'] = Scene::all();
        $data['page_title'] = "Scenes";
        return view('scenes.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = "Add a scene";
        return view('scenes.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $scene = new Scene();
        $scene->title = $request->input( 'title', '' );
        $scene->site_id = $request->input( 'site_id', '' );
        $scene->affiliate_id = $request->input( 'affiliate_id', '' );
        $scene->duration = $request->input( 'duration', '' );
        $scene->link = $request->input( 'links', '' );
        $scene->primary_thumbnail = $request->input( 'primary_thumbnail', '' );
        $scene->save();

        $tags = trim($request->input( 'tags', '' ));
        $tagsAr = explode(",", $tags);
        $textAr = array_filter($tagsAr, 'trim');
        $tagIds = array();

        foreach($textAr as $tagtext)
        {
            $tagCount = Tag::where('name', '=', $tagtext)->count();
            if($tagCount == 0)
            {
                $tag = new Tag;
                $tag->name = $tagtext;
                $tag->save();
            }

            $tag = Tag::where('name', '=', $tagtext)->first();
            $tagIds[] = $tag->id;
        }

        $scene->tag()->sync($tagIds);


        $thumbnails = trim($request->input( 'thumbnails', '' ));
        $thumbnailsAr = explode("\n", $thumbnails);
        $thumbnailsAr = array_filter($thumbnailsAr, 'trim');

        foreach($thumbnailsAr as $url)
        {
            $urlCount = Thumbnail::where('url', '=', $url)->count();
            if($urlCount == 0)
            {
                $thumbnail = new Thumbnail;
                $thumbnail->url = $url;
                $thumbnail->scene_id = $scene->id;
                $thumbnail->save();
            }
        }

        return redirect('scenes')->with('reply', 'Scene Added Successfully')->with('reply_class','success');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Scene::destroy( $id );

        return redirect('scenes')->with('reply', 'Scene Deleted Successfully')->with('reply_class','success');
    }
}
