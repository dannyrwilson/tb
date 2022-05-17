<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;

use App\Http\Requests\MediaRequest;
class MediaController extends Controller
{
	function __construct()
    {
    	$this->middleware('auth');
    }
	
	public function index()
	{
		/* 
		more indepth collection adjustment, eg. ->map or ->filter etc. 
		Would use a MediaRepository class, to perform the model to view data extraction.
		*/

		$media = Media::with('user', 'comments', 'comments.user')
		->orderBy('created_at', 'DESC')
		->get()
		->toArray();

		return response()->json($media);
	}

	public function store(MediaRequest $mediaRequest, Media $media)
	{
		return response()->json($media->create(array_merge($mediaRequest->all(), [
			'user_id' => $mediaRequest->user()->id
		])));
	}
}
