<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
		$articles = Report::withCount('comments')->get();
		$count = Report::count();
		return view('index', ['articles' => $articles, 'count' => $count]);
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
		$image_path = NULL;

		$request->validate(['image' => 'image|dimensions:max_width=1920, max_height=1080|max:4096']);
		if( isset( $request->image ) ) $image_path = $request->file('image')->store('image');
		//
		$report = new Report();
		$report->fill([
			'poster' => $request->poster,
			'title' => $request->title,
			'article' => $request->article,
			'img' => $image_path
		]);
		$report->save();
		return redirect()->route('report.index');
    }
	
    /**
	 * Display the specified resource.
     */
	public function show(Report $report)
    {
		//
    }
	
    /**
	 * Show the form for editing the specified resource.
     */
	public function edit(Report $report)
    {
		//
    }
	
    /**
	 * Update the specified resource in storage.
     */
	public function update(Request $request, Report $report)
    {
		//
    }
	
    /**
	 * Remove the specified resource from storage.
     */
	public function destroy(Report $report)
    {
		//
    }

	public function detail( Request $request, $id ) {
		$articles = Report::with('comments')->withCount('comments')->find($id);

		$create_date = $articles->created_at->format( "Y/m/d/ H:i" );
		// $create_date = $articles->created_at->format( "Y年m月d日H時i分" );
		return view('detail', ['articles' => $articles, 'create_date' => $create_date]);
	}

	public function write() {
		return view('write');
	}
	
	public function foo(Request $request) {
		$comment = 'Debug message!!';
		// $comment = $request->comment;
		return view('foo', ['comment' => $comment]);
	}

}	
