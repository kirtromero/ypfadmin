<?php

namespace App\Http\Controllers;

use App\Scene;
use App\Tag;
use App\Affiliate;
use App\Site;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class AjaxController extends Controller
{
	/**
	 * Show the profile for the given user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function activateTag()
	{
		if(\Request::has('id'))
		{
			$tag = Tag::find(Request::get('id'));
			$tag->activate = 1;
			$tag->save();

			return "Tag activated";
		}
	}

}
