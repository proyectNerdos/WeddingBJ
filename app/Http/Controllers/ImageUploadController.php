<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class ImageUploadController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        dd($request->image);

        $imageName = time().'.'.$request->image->extension();


        $request->image->move(base_path('Modules\WebContent\Resources\assets\gallery'), $imageName);

        $gallery = new Gallery;
        $gallery->image = 'gallery/'.$imageName;
        $gallery->image_filename = $imageName;
        $gallery->save();

        return back()
            ->with('success','Has subido la foto correctamente..')
            ->with('image',$imageName);
    }
}

