<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = FAQ::all();
        return Inertia::render('FAQ', ['data' => $data]);
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
  
        FAQ::create($request->all());
  
        return redirect()->back()
                    ->with('message', 'FAQ Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function show(FAQ $fAQ)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function edit(FAQ $fAQ)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FAQ $fAQ)
    {
        //
        Validator::make($request->all(), [
            'jawaban' => ['required'],
            'pertanyaan' => ['required'],
        ])->validate();
  
        if ($request->has('id')) {
            FAQ::find($request->input('id'))->update($request->all());
            return redirect()->back()
                    ->with('message', 'FAQ Updated Successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function destroy(FAQ $fAQ)
    {
        //
        if ($request->has('id')) {
            $data = FAQ::find($request->input('id'));
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
             return redirect()->back()->with('message', 'FAQ Deleted Successfully.');
            }
        }
    }
}
