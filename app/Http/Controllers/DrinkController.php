<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return "Hiển thị danh sách bài viết";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // return 'Hiển thị đồ uống';
        // Xử lý thêm dữ liệu
        // return redirect('drink'); // chuyển hướng trang
        return redirect()->route('drink.index'); // chuyển hướng trang
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
