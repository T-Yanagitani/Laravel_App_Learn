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
		$importance = Report::withCount('comments')->where('importance', '>=', '2')->latest()->take(5)->get();
		// $articles = Report::withTrashed()->withCount('comments')->latest()->take(5)->get();
		$articles = Report::withCount('comments')->latest()->take(5)->get();
		// 投稿総数
		$count = Report::count();

		$today = date('西暦Y年m月d日（D）');

		return view('index', ['importance' => $importance, 'articles' => $articles, 'count' => $count, 'today' => $today]);
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

		// $request->validate(['image' => 'image|dimensions:max_width=1920, max_height=1080|max:4096']);
		$request->validate(['image' => [
			'image',
			'mimes:jpeg, jpg, png, gif, bmp',
			'dimensions:max_width=1920, max_height=1920',
			'max:2048'
			]
		]);

		if( isset( $request->image ) ) $image_path = $request->file('image')->store('image');

		//
		$report = new Report();
		$report->fill([
			'poster' => $request->poster,
			'title' => $request->title,
			'article' => $request->article,
			'img' => $image_path,
			'tags' => $request->tags,
			'importance' => $request->importance,
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
	public function edit(Report $report, $id)
    {
		//
		$articles = Report::find($id);

		return view( 'edit', ['articles' => $articles, 'id' => $id] );
    }
	
    /**
	 * Update the specified resource in storage.
     */
	public function update(Request $request, Report $report)
    {
		//
		$report = Report::find( $request->id );
		$report->article = $request->article;
		$report->save();

		return redirect()->route( 'report.detail', ['id' => $request->id] );
    }
	
    /**
	 * Remove the specified resource from storage.
     */
	// 記事削除（物理削除）
	public function destroy(Report $report, $id)
    {
		//
		$article = Report::find( $id );
		$article->forceDelete();

		return redirect()->route( 'report.report_list' );
    }

	// 投稿一覧
	public function report_list( Request $request ) {
		$offset = $request->query('offset');
		$order = $request->query('order');
		if( !isset( $order ) ) $order = 'desc';

		if( isset( $offset ) ) {
			// $articles = Report::offset( $offset )->limit(10)->orderBy('id', $order)->withCount('comments')->withTrashed()->get();
			$articles = Report::offset( $offset )->limit(10)->orderBy('id', $order)->withCount('comments')->get();
		} else {
			// $articles = Report::limit(10)->orderBy('id', $order)->withCount('comments')->withTrashed()->get();
			$articles = Report::limit(10)->orderBy('id', $order)->withCount('comments')->get();
		}
		// 投稿総数
		$count = Report::count();

		return view('report_list', ['articles' => $articles, 'count' => $count, 'offset' => $offset, 'order' => $order]);
	}

	// 記事検索
	public function search( Request $request ) {
		$keywords = array_filter( explode( " ", trim( $request->query( 'keyword' ) ) ) );

		
		if( !empty( $keywords ) ) {
			$mode = match( $request->query('mode') ) {
				'1' => 'AND',
				'2' => 'OR',
				default => 'AND'
			};

			$query = Report::query();

			if( $mode === 'AND' ) {
				// AND検索
				foreach( $keywords as $keyword ) {
					$query->where( function ( $q ) use ( $keyword ) {
						$q->where('article', 'LIKE', "%{$keyword}%");
					});
				}
			} elseif ( $mode === 'OR' ) {
				// OR検索
				foreach( $keywords as $keyword ) {
					$query->orWhere( function ( $q ) use ( $keyword ) {
						$q->orWhere('article', 'LIKE', "%{$keyword}%");
					});
				}
			}

			$result = $query->take(10)->get();

			return view('result_list', ['articles' => $result, 'keywords' => $keywords, 'mode' => $mode ]);
		}

		return redirect()->route( 'report.index' );
	}

	// 投稿記事単体表示
	public function detail( $id ) {
		$articles = Report::with('comments')->withCount('comments')->find($id);

		$create_date = $articles->created_at->format( "Y/m/d/ H:i" );
		return view('detail', ['articles' => $articles, 'create_date' => $create_date, 'id' => $id]);
	}

	// 新規記事投稿フォーム
	public function write() {
		return view('write');
		// return view('write', ['mode' => $mode]);
	}

	// 記事削除（ソフトデリート）
	public function delete( $id ) {
		$article = Report::find( $id );
		$article->delete();

		return redirect()->route('report.report_list');
	}

	// 記事復元（ソフトデリートロールバック）
	public function restore( $id ) {
		$article = Report::find( $id );
		$article->restore();

		return redirect()->route('report.detail', ['id' => $id] );
	}
	
	// テスト
	public function foo(Request $request) {
		$comment = 'Debug message!!';
		// $comment = $request->comment;
		return view('foo', ['comment' => $comment]);
	}

}