<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['tags'] = Tag::get();
        $data['page_title'] = "Tags";
        return view('tag.index', $data);
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
        $data['tag'] = Tag::findOrFail($id);
        return view('tag.edit', $data);
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
        $tag = Tag::findOrFail($id);
        $tag->name = $request->input('name');
        $tag->slug = $request->input('slug');
        $tag->active = $request->input('active');
        $tag->thumbnail_id = $request->input('thumbnail_id');
        $tag->sort = $request->input('sort');
        $tag->save();


        return redirect('tags/' . $tag->id .'/edit')->with('reply', 'Tag update Successfully')->with('reply_class','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::destroy( $id );

        return redirect('tags')->with('reply', 'Tag Deleted Successfully')->with('reply_class','success');
    }

    public function ajaxDestroy($id)
    {
        Tag::destroy( $id );

        return "Tag deleted successfully";
    }

    public function activateTag(Request $request)
    {
        if($request->has('id'))
        {
            $count = Tag::where('active','=', 1)->count();

            $tag = Tag::find($request->get('id'));
            $tag->active = ($tag->active == 0) ? 1 : 0;
            $tag->sort = $count + 1;
            $tag->save();

            return "Tag Activated";
        }
    }

    public function showTag(Request $request)
    {
        $tag = Tag::find($request->get('id'));
        $tag->show = ($tag->show == 0) ? 1 : 0;
        $tag->save();

        return "Tag display successfully changed!";
    }

    public function ajaxTags(Request $request)
    {
        $search = $request->input('search','');
        $skip = $request->input('start');
        $limit = $request->input('length');
        $order = $request->input('order');
        $orderDir = $order[0]['dir'];

        switch ($order[0]['column']) {
            case '0':
                $orderBy = "name";
                break;
            case '1':
                $orderBy = "sort";
                break;
            case '2':
                $orderBy = "active";
                break;
            case '3':
                $orderBy = "show";
                break;
            default:
                $orderBy = "name";
                break;
        }

        if($search)
        {
            $iTotalDisplayRecords = Tag::where('name',"like","%". $search['value'] ."%")->count();
            $tags = Tag::where('name',"like","%". $search['value'] ."%")->orderBy($orderBy, $orderDir)->skip($skip)->take($limit)->get();
            $iTotalRecords = $tags->count();
        }
        else
        {
            $iTotalDisplayRecords = Tag::count();
            $tags = Tag::orderBy($orderBy, $orderDir)->skip($skip)->take($limit)->get();
            $iTotalRecords = $tags->count();
        }

        $data['iTotalRecords'] = $iTotalRecords;
        $data['iTotalDisplayRecords'] = $iTotalDisplayRecords;

        foreach ($tags as $key => $tag) {

            $html = "";
            if($tag->active == 0)
            {
                $html .= '<a href="/tags/'.$tag->id.'/edit" data-id="'.$tag->id.'" class="btn btn-xs btn-info activate">Activate</a>';
            }
            else
            {
                $html .= '<a href="/tags/'.$tag->id.'/edit" data-id="'.$tag->id.'" class="btn btn-xs btn-warning activate">Deactivate</a>';
            }

            if($tag->show == 0)
            {
                $html .= '<a href="/tags/'.$tag->id.'/edit" data-id="'.$tag->id.'" class="btn btn-xs btn-success show-btn">Show</a>';
            }
            else
            {
                $html .= '<a href="/tags/'.$tag->id.'/edit" data-id="'.$tag->id.'" class="btn btn-xs btn-warning show-btn">Hide</a>';
            }

            $html .= '<a href="/tags/'.$tag->id.'/edit" class="btn btn-xs btn-primary">Edit</a>';
            $html .= '<a class="btn btn-xs btn-danger delete-btn" data-id="'.$tag->id.'" type="submit">Delete</a>';

            $data['data'][] = array(
                                'name' => $tag->name,
                                'sort' => $tag->sort,
                                'active' => $tag->active,
                                'show' => $tag->show,
                                'html' => $html
                                );
        }

        return response()->json($data);
    }
}
