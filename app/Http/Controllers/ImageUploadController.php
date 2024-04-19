<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class ImageUploadController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:50000',
        ]);


        $imageName = time().'.'.$request->image->extension();

        $request->image->move(base_path('Modules\WebContent\Resources\assets\gallery'), $imageName);

        $galleries = new Gallery;
        $galleries->image = 'gallery/'.$imageName;
        $galleries->image_filename = $imageName;
        $galleries->save();

        return back()
            ->with('success','Has subido la foto correctamente..')
            ->with('image',$imageName);
    }
}




