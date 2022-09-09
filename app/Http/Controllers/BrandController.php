<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function list()
    {
        $brands = Brand::select('*')->orderBy('id', 'desc')->paginate(8);
        return view('admin.brand.list', ['brands' => $brands]);
    }
    public function getCreate()
    {
        return view('admin.brand.create');
    }
    public function postCreate(Request $request)
    {
        $brands = new Brand();
        $data = $request->all();
        $data['status'] = 1;
        $brands->create($data);
        session()->flash('success', 'Brand created successfully');
        return redirect()->route('admin.brands.list');
    }

    public function getUpdate(Brand $id) {
        // dd($id);
        return view('admin.brand.create', ['brand' => $id]);
    }
    public function postUpdate(Request $request) {
        $data = Brand::find($request->id);
        $data->name = $request->name;
        $data->content = $request->content;
        $data->save();
        session()->flash('success', 'Brand update successfully');
        return redirect()->route('admin.brands.list');
    }
    public function delete(Brand $id)
    {
        $id->delete();
        session()->flash('success', 'Xóa thương hiệu thành công');
        return redirect()->back();
    }
    public function upStatus(Brand $id) {
        if($id->status == 1) {
            $id->update(['status' => 0]);
            return redirect()->back();
        }else{
            $id->update(['status' => 1]);
            return redirect()->back();
        }
    }
}
