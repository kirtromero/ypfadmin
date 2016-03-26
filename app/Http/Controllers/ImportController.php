<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Scene;
use App\Affiliate;
use App\Site;
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
        $data['affiliates'] = Affiliate::all();
        $data['sites'] = Site::all();
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
                    $slug = str_slug($tagtext, "-");
                    $tagCount = Tag::where('slug', '=', $slug)->count();
                    if($tagCount == 0)
                    {
                        $tag = new Tag;
                        $tag->name = str_replace("-"," ",$tagtext);
                        $tag->slug = $slug;
                        $tag->save();

                        $tagIds[] = $tag->id;
                    }
                    else
                    {
                        $tag = Tag::where('slug', '=', $slug)->first();
                        $tagIds[] = $tag->id;
                    }

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

        return redirect('imports')->with('reply', 'Import Successfully')->with('reply_class','success');
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


    public function postfeeds(Request $request)
    {
        $format = $request->get('dump_format');
        $affiliate_id = $request->get('affiliate_id');
        $site_id = $request->get('site_id');

        $dump = explode("\n", $request->get('dump'));

        $format = explode("|", $format);

        $embed_key = array_search('{embed}', $format);
        $title_key = array_search('{title}', $format);
        $primary_thumbnail_key = array_search('{primary_thumbnail}', $format);
        $link_key = array_search('{link}', $format);
        $duration_key = array_search('{duration}', $format);
        $keywords_key = array_search('{keywords}', $format);
        $thumbnails_key = array_search('{thumbnails}', $format);

        foreach($dump as $items)
        {
            $item = explode("|", $items);

            $link = $item[$link_key];
            $embed = $item[$embed_key];
            $title = $item[$title_key];
            $primary_thumbnail = $item[$primary_thumbnail_key];
            $thumbnails = $item[$thumbnails_key];
            $tags = $item[$keywords_key];
            $duration = $item[$duration_key];

            $scene = new Scene();
            $scene->title = $title;
            $scene->embed = $embed;
            $scene->site_id = $request->input( 'site_id', 1 );
            $scene->affiliate_id = $request->input( 'affiliate_id', 1);
            $scene->duration = $duration;
            $scene->link = $link;
            $scene->primary_thumbnail = $primary_thumbnail;
            $scene->save();

            $tags = trim($tags);
            $tagsAr = explode(";", $tags);
            $textAr = array_filter($tagsAr, 'trim');
            $tagIds = array();

            foreach($textAr as $tagtext)
            {
                $slug = str_slug($tagtext, "-");
                $tagCount = Tag::where('slug', '=', $slug)->count();
                if($tagCount == 0)
                {
                    $tag = new Tag;
                    $tag->name = str_replace("-"," ",$tagtext);
                    $tag->slug = $slug;
                    $tag->save();

                    $tagIds[] = $tag->id;
                }
                else
                {
                    $tag = Tag::where('slug', '=', $slug)->first();
                    $tagIds[] = $tag->id;
                }

            }

            $scene->tag()->sync($tagIds);

            $thumbnail = explode(";", $thumbnails);
            foreach ($thumbnail as $key => $value) {
                $thumbnail = new Thumbnail;
                $thumbnail->url = $value;
                $thumbnail->scene_id = $scene->id;
                $thumbnail->save();
            }
        }
    }
}
