<?php

namespace App\Http\Controllers;

use App\Models\WhyUs;
use App\Models\kontak;
use Illuminate\Http\Request;

use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;

class WhyUsController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexKontak()
    {
        //
        $data = kontak::all();
        return Inertia::render('Kontak', ['data' => $data]);
    }
    public function index()
    {
        //
        $data = WhyUs::all();
        return Inertia::render('Whyus', ['data' => $data]);
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
        Validator::make($request->all(), [
            'jawaban' => ['required'],
            'pertanyaan' => ['required'],
        ])->validate();
  
        WhyUs::create($request->all());
  
        return redirect()->back()
                    ->with('message', 'WhyUs Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WhyUs  $WhyUs
     * @return \Illuminate\Http\Response
     */
    public function show(WhyUs $WhyUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WhyUs  $WhyUs
     * @return \Illuminate\Http\Response
     */
    public function edit(WhyUs $WhyUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WhyUs  $WhyUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WhyUs $WhyUs)
    {
        //
        Validator::make($request->all(), [
            'jawaban' => ['required'],
            'pertanyaan' => ['required'],
        ])->validate();
  
        if ($request->has('id')) {
            WhyUs::find($request->input('id'))->update($request->all());
            return redirect()->back()
                    ->with('message', 'WhyUs Updated Successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WhyUs  $WhyUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(WhyUs $WhyUs)
    {
        //
        if ($request->has('id')) {
            $data = WhyUs::find($request->input('id'));
            if($data){
                $fotos = json_decode($data->gambar);
                // dd($fotos);die;
                foreach($fotos as $foto){
                    $url = str_replace('images','img',$foto);
                    // echo  $url. '/hapus </br>';
                    Http::get($url.'/hapus');
                }
                $data->delete();
                die;
             return redirect()->back()->with('message', 'WhyUs Deleted Successfully.');
            }
        }
    }
}
