<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPostController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return "Admin: Thêm bài viết";
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
        return "Admin: Cập nhật bài viết dựa trên id: " . $id;
    }

    /**
     * Delete post.
     */
    public function delete(int $id)
    {
        return "Admin: Xóa bài viết dựa trên id: " . $id;
    }
}
