<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comment;

class CommentController extends Controller
{
	function __construct()
    {
    	$this->middleware('auth');
    }
	
    public function store(Request $request, Comment $comment)
		{
			// @todo move request into CommentRequest
			$this->validate($request, [
				'comment' => 'required'
			]);

			return response()->json($comment->create(array_merge($request->all(), [
				'user_id' => $request->user()->id
			])));
		}
}
