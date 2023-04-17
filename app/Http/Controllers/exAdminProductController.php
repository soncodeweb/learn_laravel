<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class exAdminProductController extends Controller
{
    //

    public function show($id = null)
    {
        if ($id) {
            $products = DB::table('products')->where('id', $id)->get();
            foreach ($products as $product) {
                echo $product->name;
                echo '<br>';
            }
        } else {
            $products = DB::table('products')->select('name')->get();
            foreach ($products as $product) {
                echo $product->name;
                echo '<br>';
            }
        }
    }
    public function add()
    {
        $product = ['name' => 'Iphone', 'content' => 'content iphone', 'price' => '100000', 'product_cat_id' => 2, 'user_id' => 1];

        DB::table('products')->insert(
            $product
        );
    }
    public function update(int $id)
    {
        $product = ['content' => 'Update content iphone'];

        DB::table('products')->where('id', $id)->update(
            $product
        );
    }
    public function delete(int $id)
    {
        DB::table('products')->where('id', $id)->delete();
    }
}
