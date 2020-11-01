<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Inertia\Inertia;
use App\Models\Profile;
use App\Models\Portofolio;

use Illuminate\Support\Facades\Validator;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Profile::all();
        // dd($data);die;
        return Inertia::render('maleo-profile', ['data' => $data]);
    }
    public function indexPortofolio()
    {
        //
        $data = Portofolio::all();
        // dd($data);die;
        return Inertia::render('Portofolio', ['data' => $data]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
 
    public function update(Request $request)
    {
        Validator::make($request->all(), [
            'tag_line' => ['required'],
            'about_us' => ['required'],
            'alamat' => ['required'],
            'handphone' => ['required'],
            'email' => ['required'],
            'ig' => ['required'],
            // 'fb' => ['required'],
            'd1' => ['required'],
            'd2' => ['required'],
            'd3' => ['required'],
            'd4' => ['required'],
            'd5' => ['required'],
        ])->validate();
  
        if ($request->has('id')) {
            Profile::find($request->input('id'))->update($request->all());
            return redirect()->back()
                    ->with('message', 'Profile Updated Successfully.');
        }
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
