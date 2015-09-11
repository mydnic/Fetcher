<?php

namespace App\Http\Controllers\API;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (Request::get('withArticles')) {
            $number     = Request::get('number');
            $categories = Category::all();
            foreach ($categories as $category) {
                $category->load(['sources.articles' => function ($q) use (&$articles, $number) {
                    $articles = $q->orderBy('date', 'DESC')->take($number)->get()->unique();
                }]);
                $result = [
                    'name'      => $category->name,
                    'id'        => $category->id,
                    'image_url' => $category->image_url,
                    'articles'  => $articles,
                ];
            }

            return $result;
        }
        return Category::all(['name', 'id']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getArticles($id, $number)
    {
        $sources = Category::whereName($id)->first()->sources;
        $ids     = [];
        foreach ($sources as $source) {
            $ids[] = $source->id;
        }
        return Article::whereIn('source_id', $ids)->orderBy('date', 'DESC')->take($number)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
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
        //
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
