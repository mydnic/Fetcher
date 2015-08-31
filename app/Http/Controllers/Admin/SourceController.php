<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Source;
use Feeds;
use Illuminate\Http\Request;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $sources = Source::all();
        return view('admin.source.index')
            ->with('sources', $sources);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.source.create')
            ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $source              = Source::firstOrNew(['feed_url' => $request->input('feed_url')]);
        $feed                = Feeds::make($source->feed_url);
        $source->name        = $feed->get_title();
        $source->website_url = $feed->get_permalink();
        $source->save();

        $post->categories()->sync($request->input('category_id'));

        Flash::success('Source added !');
        return redirect()->route('source.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $source     = Source::find($id);
        return view('admin.source.edit')
            ->with('source', $source)
            ->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $source              = Source::find($id);
        $source->feed_url    = $request->input('feed_url');
        $feed                = Feeds::make($source->feed_url);
        $source->name        = $feed->get_title();
        $source->website_url = $feed->get_permalink();
        $source->save();

        $post->categories()->sync($request->input('category_id'));
        
        Flash::success('Source updated !');
        return redirect()->route('source.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
