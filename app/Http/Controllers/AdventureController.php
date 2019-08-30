<?php

namespace App\Http\Controllers;

use App\Adventure;
use Illuminate\Http\Request;


class AdventureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $adventures = Adventure::all();
        // return view('adventure.index', [
        //     'adventures' => $adventures
        // ]);

        $adventures= Adventure::orderBy('id', 'DESC')->paginate(3);
        return view('adventure.index', compact('adventures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $adventures = new Adventure;
        return view('adventure.create', [
            'adventures' => $adventures
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
        $adventures = new Adventure([
            'name' => $request->name
        ]);
        $adventures->save();
        return redirect()->action('AdventureController@show', [$adventures]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Adventure  $adventure
     * @return \Illuminate\Http\Response
     */
    public function show(Adventure $adventure)
    {
        return view('adventure.show', [
            'adventure' => $adventure
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Adventure  $adventure
     * @return \Illuminate\Http\Response
     */
    public function edit(Adventure $adventure)
    {
        //
        //die($adventure);
        return view('adventure.edit', [
            'adventure' => $adventure
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Adventure  $adventure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adventure $adventure)
    {
        //
        $adventure->name = $request->name;
        $adventure->save();
        return redirect()->action('AdventureController@show', ['adventure' => $adventure]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Adventure  $adventure
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Adventure::find($id)->delete();
        return redirect()->route('adventure.index')->with('success','Registration deleted successfully');
    }
}
