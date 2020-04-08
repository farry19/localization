<?php

namespace App\Http\Controllers;

use App\NewsItem;
use Illuminate\Http\Request;

class NewsItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsitems = NewsItem::all();

        return view('newsitems.index', compact('newsitems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newsitems.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newsitem = new NewsItem;

        $newsitem->setTranslation('name', $request->lang, $request->name);
        $newsitem->setTranslation('body', $request->lang, $request->body);

        $newsitem->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NewsItem  $newsItem
     * @return \Illuminate\Http\Response
     */
    public function show(NewsItem $newsItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NewsItem  $newsItem
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsItem $newsItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NewsItem  $newsItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsItem $newsItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NewsItem  $newsItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsItem $newsItem)
    {
        //
    }
}
