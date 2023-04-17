<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function show($id)
    {
        // return "Thông tin sản phẩm id: " . $id;
        // Gọi view từ controller 
        // return view('product.show'); 
        $price = 210000;
        $colors = ['red', 'green'];
        // return view('product.show', array('id' => $id, 'price' => $price)); // gửi dữ liệu sang view với data
        return view('product.show', compact('id', 'price', 'colors')); // compact là rút gọn của array phía trên
    }
    public function create()
    {
        // return "Thêm sản phẩm mới";
        return view('product.create');
    }
    public function update($id)
    {
        return "Update sản phẩm có id: " . $id;
    }
}
