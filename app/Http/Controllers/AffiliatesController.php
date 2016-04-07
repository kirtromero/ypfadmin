<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Affiliate;
use App\Feed;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AffiliatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['affiliates'] = Affiliate::all();
        $data['page_title'] = "Affiliates";
        return view('affiliates.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = "Affiliates";
        return view('affiliates.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $affiliate = new Affiliate();
        $affiliate->name = $request->input('name');
        $affiliate->url = $request->input('url');
        $affiliate->save();

        return redirect('affiliates')->with('reply', 'Affiliate added Successfully')->with('reply_class','success');
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
        $data['affiliate'] = Affiliate::findOrFail($id);
        return view('affiliates.edit', $data);
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
        $affiliate = Affiliate::findOrFail($id);
        $affiliate->name = $request->input('name');
        $affiliate->url = $request->input('url');
        $affiliate->save();

        $feed = new Feed;
        $feed->affiliate_id = $affiliate->id;
        $feed->url = $request->input('feedUrl');
        $feed->save();

        return redirect()->back()->with('reply', 'Scene update Successfully')->with('reply_class','success');
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
