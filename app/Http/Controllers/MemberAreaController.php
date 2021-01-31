<?php

namespace App\Http\Controllers;

use App\Models\MemberArea;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MemberAreaController extends Controller
{
    function __construct()
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
        //
        $data = MemberArea::all();
        return Inertia::render('Member-area', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MemberArea  $memberArea
     * @return \Illuminate\Http\Response
     */
    public function show(MemberArea $memberArea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MemberArea  $memberArea
     * @return \Illuminate\Http\Response
     */
    public function edit(MemberArea $memberArea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MemberArea  $memberArea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MemberArea $memberArea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MemberArea  $memberArea
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemberArea $memberArea)
    {
        //
    }
}
