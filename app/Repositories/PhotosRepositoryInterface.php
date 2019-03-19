<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface PhotosRepositoryInterface
{
    public function fileUpload(Request $request);
}