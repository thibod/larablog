<?php

namespace App\Repositories;

use Illuminate\Http\Request;

class PhotosRepository implements PhotosRepositoryInterface
{
    public function fileUpload(Request $request) {
        // $this->validate($request, [
        //     'input_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        // ]);
    
        if ($request->hasFile('post_image')) {
            $image = $request->file('post_image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('storage');
            $image->move($destinationPath, $name);
            return $name;
        }
    }
}