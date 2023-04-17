<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class exAdminPostController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.post.create');
    }


    /**
     * Show list of posts by id
     */
    public function show(int $id)
    {
        //
        // return "Admin: Hiển thị bài viết dựa trên id: " . $id;
        return view('admin.post.show', compact("id"));
    }



    /**
     * Update post
     */
    public function update(int $id)
    {
        //
        return view('admin.post.update', compact("id"));
    }
}
