<?php

namespace App\Http\Controllers;

use App\Cat;
use App\FeedRecord;
use Illuminate\Http\Request;
use Auth;
class FeedRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $feedRecords = $user->feedRecords;
        return view('feedRecoerd/index', compact('feedRecords'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cat_id)
    {
        return view('feedRecord.create', compact('cat_id'));
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
            return redirect()->route('cat.show', $request->cat_id);
        }
        $form = $request->all();
        $feedRecord = new FeedRecord;
        $feedRecord->cat_id = $request->cat_id;
        $feedRecord->fill($form);
        $feedRecord->save();
        
        return redirect()->route('cat.show', $request->cat_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feedRecords = \App\FeedRecord::find($id);
        return view('feedRecored.show', compact('feedRecords'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
