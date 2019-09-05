<?php

namespace App\Http\Controllers;

use App\Dictionary;
use Illuminate\Http\Request;


class DictionaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $terms= Dictionary::orderBy('id', 'DESC')->paginate(3);
        return view('dictionary.index', compact('terms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $term = new Dictionary();
        return view('dictionary.create', [
            'term' => $term
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $term = new Dictionary([
            'term' => $request->term,
            'language' => $request->language,
            'translate_id' => $request->translate_id,

        ]);
        $term->save();
        return redirect()->action('DictionaryController@show', [$term]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dictionary  $term
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $term = Dictionary::find($id);
        return view('dictionary.show', [
            'term' => $term
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dictionary  $term
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $term = Dictionary::find($id);
        return view('dictionary.edit', [
            'term' => $term,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dictionary  $term
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $term = Dictionary::find($id);
        $term->term = $request->term;
        $term->language = $request->language;
        $term->translate_id = $request->translate_id;
        $term->save();
        return redirect()->action('DictionaryController@show', ['term' => $term]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dictionary  $term
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Dictionary::find($id)->delete();
        return redirect()->route('dictionary.index')->with('success','Registration deleted successfully');
    }

    public function translate(Request $request){
        if ($request->input('term')){
            $result = Dictionary::translate($request->input('term'),$request->language);
            return redirect()->route('dictionary')->with('success','translate =' . $result);
        }else{
            return view('dictionary.translate', [
                    'term' => '',
                    'language' => ''
            ]);
        }
    }
}
