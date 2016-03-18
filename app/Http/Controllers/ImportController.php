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

        $scene = new Scene;
        $scene->title = "test";
        $scene->duration = "20:12";
        $scene->links = "http://www.pornhub.com/view_video.php?viewkey=177783772";
        $scene->affiliate_id = "1";
        $scene->site_id = "1";
        $scene->primary_thumbnail = "http://i0.cdn2b.image.pornhub.phncdn.com/m=e0YH8daaaa/videos/201404/25/26008842/original/12.jpg";
        $scene->save();

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
        //
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
