<?php

namespace App\Http\Controllers;
Use Alert;
use Illuminate\Http\Request;
use App\Models\Gallery;

class ImageUploadController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:jpeg,png,jpg,gif,svg,mp4,avi,wmv,flv|max:20000',
    ]);

    $fileName = time().'.'.$request->file->extension();

    $request->file->move(public_path('theme-front/casamiento/gallery'), $fileName);

    $galleries = new Gallery;
    $galleries->image = 'gallery/'.$fileName;
    $galleries->image_filename = $fileName;
    $galleries->save();

    Alert::success('Felicidades', 'Archivo cargado en la galería!');

    return back()
        ->with('success','Has subido el archivo correctamente.')
        ->with('image',$fileName);
}
}




