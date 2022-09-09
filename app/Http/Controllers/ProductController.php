<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list() {
        return view('admin.product.list');
    }

    public function getCreate() {
        return view('admin.product.create');
    }
}
