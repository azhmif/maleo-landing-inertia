<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;

class UploadFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function dropzoneStore(Request $request, $folder)
    {
        $image = $request->file('file');

        $imageName = time() . '-' . strtoupper(Str::random(10)) . '.' . $image->extension();
        $image->move(public_path('images/' . $folder), $imageName);

        return response()->json(['success' => $request->getSchemeAndHttpHost() . '/images/' . $folder . '/' . $imageName]);
    }
    public function deleteFile($folder, $file)
    {
        // unlink(public_path('images/'.$folder), $file);

        $avatar_path = public_path('images/' . $folder) . '/' . $file;
        if (file_exists($avatar_path)) {

            $file = unlink($avatar_path);
            $res['success'] = true;
            $res['message'] = "Berhasil hapus file";
            return $res;
        }
        $res['success'] = false;
        $res['message'] = "Avatar not found";

        return $res;

        // return response()->json(['success'=> $request->getSchemeAndHttpHost().'/images/'.$folder.'/'.$imageName]);
    }

    public function dropzoneStoreMultiple(Request $request, $folder)
    {
        $images = $request->file('files');

        foreach ($images as $image) {
            $imageName = time() . '-' . strtoupper(Str::random(10)) . '.' . $image->extension();
            $image->move(public_path('images/' . $folder), $imageName);
            $url[] = $request->getSchemeAndHttpHost() . '/images/' . $folder . '/' . $imageName;
        }

        return response()->json(['success' => $url]);
    }
}
