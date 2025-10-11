<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
		$comment = new Comment();
		$comment->fill([
			'poster' => $request->poster,
			'comment' => $request->comment,
			'Comment_id' =>$request->Comment_id
		]);
		$comment->save();
		return redirect()->route('Comment.detail', ['id' => $request->Comment_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment, $comment_id, $article_id)
    {
        //
		$article = Comment::find( $comment_id );
		$article->forceDelete();

		return redirect()->route( 'report.detail', ['id' => $article_id] );
    }

	// 記事削除（ソフトデリート）
	public function delete( $comment_id, $article_id ) {
		$article = Comment::find( $comment_id );
		$article->delete();

		return redirect()->route('report.detail', ['id' => $article_id] );
	}

	// 記事復元（ソフトデリートロールバック）
	public function restore( $id ) {
		$article = Comment::find( $id );
		$article->restore();

		return redirect()->route('report.detail', ['id' => $id] );
	}
}
