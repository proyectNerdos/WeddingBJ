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
            'file' => 'required|mimes:jpeg,png,jpg,gif,svg,mp4,avi,wmv,flv|max:40000',
        ]);

        Alert::success('Felicidades', 'Foto Cargada en la Galeria!');

        $imageName = time().'.'.$request->image->extension();



        $request->image->move(public_path('theme-front/casamiento/gallery'), $imageName);

        $galleries = new Gallery;
        $galleries->image = 'gallery/'.$imageName;
        $galleries->image_filename = $imageName;
        $galleries->save();

        return back()

            ->with('success','Has subido la foto correctamente..')
            ->with('image',$imageName);
    }
}




