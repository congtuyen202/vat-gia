<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list()
    {
        $product_list = Product::select('*')->with('category')->with('brand')->orderBy('id', 'desc')->paginate(8);
        return view('admin.product.list', ['product_list' => $product_list]);
    }

    public function getCreate()
    {
        $category_list = Category::select('*')->get();
        $brand_list = Brand::select('*')->get();
        return view('admin.product.create', ['category_list' => $category_list, 'brand_list' => $brand_list]);
    }
    public function postCreate(Request $request)
    {
        $data = new Product();
        $data->fill($request->all());
        $data->status = 1;
        $data->sold = 0;
        if ($request->hasFile('images')) {
            $img = $request->images;
            $imgName = $img->extension();
            $imgName = time() . '.' . $imgName;
            $data->images = $img->storeAs('images/products', $imgName);
        } else {
            $data->images = '';
        }
        $data->save();
        session()->flash('success', 'Thêm mới thành công!');
        return redirect()->route('admin.products.list');
    }

    public function getUpdate(Product $id)
    {
        $brand_list = Brand::select('*')->get();
        $category_list = Category::select('*')->get();
        return view('admin.product.edit', ['product' => $id, 'category_list' => $category_list, 'brand_list' => $brand_list]);
    }
    public function postUpdate(Request $request)
    {
        $product = Product::find($request->id);
        if ($request->hasFile('images_up')) {
            $img = $request->images_up;
            $imgName = $img->extension();
            $imgName = time() . '.' . $imgName;
            $images_up = $img->storeAs('images/products', $imgName);
        } else {
            $images_up = $request->images;
        }
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'price_sale' => $request->price_sale,
            'description' => $request->description,
            'cat_id' => $request->cat_id,
            'brand_id' => $request->brand_id,
            'quantity' => $request->quantity,
            'images' => $images_up,
        ]);
        session()->flash('success', 'Cập nhật thành công!');
        return redirect()->route('admin.products.list');
    }

    public function delete(Product $id)
    {
        $id->delete();
        session()->flash('success', 'Xóa thành công!');
        return redirect()->back();
    }
    public function upStatus(Product $id)
    {
        if ($id->status == 1) {
            $id->update(['status' => 0]);
            return redirect()->back();
        } else {
            $id->update(['status' => 1]);
            return redirect()->back();
        }
    }
}
