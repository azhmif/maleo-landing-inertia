<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;
use Inertia\Inertia;

use Illuminate\Support\Facades\Validator;
  
use Illuminate\Support\Facades\Http;
class PortofolioController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Portofolio::all();
        return Inertia::render('Portofolio', ['data' => $data]);
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'jenis' => ['required'],
            'gambar' => ['required'],
            'judul' => ['required'],
        ])->validate();
  
        Portofolio::create($request->all());
  
        return redirect()->back()
                    ->with('message', 'Portofolio Created Successfully.');
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function update(Request $request)
    {
        Validator::make($request->all(), [
            'jenis' => ['required'],
            'gambar' => ['required'],
            'judul' => ['required'],
        ])->validate();
  
        if ($request->has('id')) {
            Portofolio::find($request->input('id'))->update($request->all());
            return redirect()->back()
                    ->with('message', 'Portofolio Updated Successfully.');
        }
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function destroy(Request $request)
    {
        if ($request->has('id')) {
            $data = Portofolio::find($request->input('id'));
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
             return redirect()->back()->with('message', 'Portofolio Deleted Successfully.');
            }
        }
    }
}
