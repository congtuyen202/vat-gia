<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class CategoryController extends Controller
{
    public function list() {
        $category_list = Category::select('*')->orderBy('id', 'desc')->paginate(6);
        $category_list_parent = Category::select('*')->orderBy('parent_id', 'asc')->get();
        return view('admin.category.list', ['category_list' => $category_list, 'category_list_parent' => $category_list_parent]);
    }
    public function postCreate(Request $request) {
        $category = new Category();
        $data = $request->all();
        $data['status'] = 1;
        $category->create($data);
        session()->flash('success', 'Thêm mới thành công!');
        return redirect()->route('admin.categories.list');
    }
    public function getUpdate(Category $id) {
        $category_list_parent = Category::select('*')->orderBy('parent_id', 'asc')->get();
        $category_list = Category::select('*')->orderBy('id', 'desc')->paginate(6);
        return view('admin.category.list', ['category' => $id, 'category_list' => $category_list, 'category_list_parent' => $category_list_parent]);
    }
    public function postUpdate(Request $request) {
        $data = Category::find($request->id);
        $data->name = $request->name;
        $data->content = $request->content;
        $data->parent_id = $request->parent_id;
        $data->save();
        session()->flash('success', 'Cập nhật thành công!');
        return redirect()->route('admin.categories.list');
    }
    public function delete(Category $id)
    {
        $id->delete();
        session()->flash('success', 'Xóa thành công!');
        return redirect()->back();
    }
    public function upStatus(Category $id) {
        if($id->status == 1) {
            $id->update(['status' => 0]);
            return redirect()->back();
        }else{
            $id->update(['status' => 1]);
            return redirect()->back();
        }
    }
}
