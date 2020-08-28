<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cat;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class CatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $cats = $user->cats;
        return view('cat/index', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->action === 'back') {
            return redirect()->route('cat.index');
        }
        $form = $request->all();
        $cat = new Cat;
        $cat->user_id = Auth::id();
        $cat->fill($form);
        $cat->save();
        return redirect()->route('cat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cats = \App\Cat::find($id);
        return view('cat.show', compact('cats'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cats = \App\Cat::find($id);
        return view('cat.edit', ['cats' => $cats]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->action === 'back') return redirect()->route('cat.index');
        
        $cat = \App\Cat::find($id);
        $cat->name = $request->name;
        $cat->save();
        return redirect()->route('cat.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cats = \App\Cat::find($id);
        $cats->delete();
        return redirect()->route('cat.index');
    }
}
