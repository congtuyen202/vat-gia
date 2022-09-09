<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $menu = Category::where('parent_id',0)->get();
        return view('client.index', ['menu' => $menu]);
    }
}
