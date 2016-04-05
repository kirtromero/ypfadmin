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
        $data['scenes'] = Scene::orderBy('created_at',"desc")->get();
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

        $scenes = trim($request->input( 'scenes', '' ));
        $scenesAr = explode(",", $scenes);
        $textAr = array_filter($scenesAr, 'trim');
        $sceneIds = array();

        foreach($textAr as $scenetext)
        {
            $sceneCount = scene::where('name', '=', $scenetext)->count();
            if($sceneCount == 0)
            {
                $scene = new scene;
                $scene->name = $scenetext;
                $scene->save();
            }

            $scene = scene::where('name', '=', $scenetext)->first();
            $sceneIds[] = $scene->id;
        }

        $scene->scene()->sync($sceneIds);


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
        $data['scene'] = Scene::findOrFail($id);
        return view('scenes.edit', $data);
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
        $scene = Scene::findOrFail($id);
        $scene->title = $request->input('title');
        $scene->link = $request->input('link');
        $scene->duration = $request->input('duration');
        $scene->rating = $request->input('rating');
        $scene->primary_thumbnail = $request->input('primary_thumbnail');
        $tag->save();


        return redirect('scenes/' . $scene->id .'/edit')->with('reply', 'Scene update Successfully')->with('reply_class','success');
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ajaxDestroy($id)
    {
        Tag::destroy( $id );

        return "Tag deleted successfully";
    }

    public function ajaxScenes(Request $request)
    {
        $search = $request->input('search','');
        $skip = $request->input('start');
        $limit = $request->input('length');
        $order = $request->input('order');
        $orderDir = $order[0]['dir'];
        $orderBy = "created_at";

        switch ($order[0]['column']) {
            case '1':
                $orderBy = "title";
                break;
            case '2':
                $orderBy = "duration";
                break;
            case '3':
                $orderBy = "links";
                break;
            default:
                $orderBy = "created_at";
                break;
        }

        if($search)
        {
            $iTotalDisplayRecords = Scene::where('title',"like","%". $search['value'] ."%")->count();
            $scenes = Scene::where('title',"like","%". $search['value'] ."%")->orderBy($orderBy, $orderDir)->skip($skip)->take($limit)->get();
            $iTotalRecords = $scenes->count();
        }
        else
        {
            $iTotalDisplayRecords = Scene::count();
            $scenes = Scene::orderBy($orderBy, $orderDir)->skip($skip)->take($limit)->get();
            $iTotalRecords = $scenes->count();
        }

        $data['iTotalRecords'] = $iTotalRecords;
        $data['iTotalDisplayRecords'] = $iTotalDisplayRecords;

        foreach ($scenes as $key => $scene)
        {
            $html = "";

            $html .= '<a href="/scenes/'.$scene->id.'/edit" class="btn btn-xs btn-primary">Edit</a>';
            $html .= '<a class="btn btn-xs btn-danger delete-btn" data-id="'.$scene->id.'" type="submit">Delete</a>';

            $data['data'][] = array(
                                'thumbnail' => '<img src="'.$scene->primary_thumbnail.'">',
                                'title' => $scene->title,
                                'duration' => $scene->duration,
                                'link' => $scene->link,
                                'date' => $scene->created_at,
                                'html' => $html
                                );
        }

        return response()->json($data);
    }
}
