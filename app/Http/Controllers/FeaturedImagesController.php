<?php

namespace App\Http\Controllers;

use App\Models\FeaturedImages;
use Illuminate\Http\Request;

class FeaturedImagesController extends Controller
{
    //
    function read(int $id)
    {
        $post = FeaturedImages::find($id)->post;
        return $post;
    }
}
