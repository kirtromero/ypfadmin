<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Scene;
use App\Tag;
use App\Thumbnail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = "Imports";
        return view('imports.index', $data);
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
    public function store(Request $request)
    {
        $xml = simplexml_load_file($request->input('url'), 'SimpleXMLElement', LIBXML_NOCDATA);

        foreach ($xml->channel->item as $key => $item)
        {
            $count = Scene::where('link',"=", $item->link)->count();

            if($count == 0)
            {
                $scene = new Scene();
                $scene->title = $item->title;
                $scene->embed = $item->embed;
                $scene->site_id = $request->input( 'site_id', 1 );
                $scene->affiliate_id = $request->input( 'affiliate_id', 1);
                $scene->duration = $item->duration;
                $scene->link = $item->link;
                $scene->primary_thumbnail = $item->thumb;
                $scene->save();

                $tags = trim($item->keywords);
                $tagsAr = explode(",", $tags);
                $textAr = array_filter($tagsAr, 'trim');
                $tagIds = array();

                foreach($textAr as $tagtext)
                {
                    $tagCount = Tag::where('name', '=', $tagtext)->count();
                    if($tagCount == 0)
                    {
                        $tag = new Tag;
                        $tag->name = str_replace("-"," ",$tagtext);
                        $tag->slug = str_slug($item->title, "-");
                        $tag->save();
                    }

                    $tag = Tag::where('name', '=', $tagtext)->first();
                    $tagIds[] = $tag->id;
                }

                $scene->tag()->sync($tagIds);

                $thumbnail = new Thumbnail;
                $thumbnail->url = $item->thumb;
                $thumbnail->scene_id = $scene->id;
                $thumbnail->save();
            }
            else
            {
                $scene = Scene::where('link',"=", $item->link)->first();
                $scene->title = $item->title;
                $scene->embed = $item->embed;
                $scene->site_id = $request->input( 'site_id', 1 );
                $scene->affiliate_id = $request->input( 'affiliate_id', 1);
                $scene->duration = $item->duration;
                $scene->link = $item->link;
                $scene->primary_thumbnail = $item->thumb;
                $scene->save();
            }
        }

        return redirect('scenes')->with('reply', 'Import Successfully')->with('reply_class','success');
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
        //
    }
}
