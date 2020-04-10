<?php

namespace App\Http\Controllers;

use App\Pair;
use App\Language;
use Illuminate\Http\Request;

class LanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::with('pairs')->get();

        return response()->json([
            'languages' => $languages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Language::with('pairs')->get();


        return view('languages.create', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $languages = [];

        Language::get()->each(function($language) {
            $language->pairs()->delete();
            $language->delete();
        });

        foreach ($request->body as $language) {
            $languages[] = new Language;
            
            end($languages)->name           = $language['name'];
            end($languages)->short_name     = $language['short_name'];
            end($languages)->text_direction = $language['text_direction'];
            end($languages)->text_align     = $language['text_align'];
            end($languages)->flex_direction = $language['flex_direction'];

            end($languages)->save();
            
            $pairs = [];
            foreach ($language['pairs'] as $pair) {
                $pairs[] = new Pair;

                end($pairs)['key']          = $pair['key'];
                end($pairs)['value']        = $pair['value'];
                end($pairs)['language_id']  = end($languages)->id;

            }

            end($languages)->pairs()->saveMany($pairs);
        }

        return response()->json([
            'languages' => $languages
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        $language->pairs()->delete();
        $language->delete();

        return response()->json([
            'status'    => true,
            'msg'       => 'Language Deleted successfully'
        ]);
    }
}
