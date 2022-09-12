@extends('admin.layout.main')
@section('title', 'Danh mục')
@section('content-header', 'Danh mục')
@section('nav-right', 'Danh mục')
@section('content-main')
<?php
function showCategories($categories, $parent_id = 0, $char = '')
{
    foreach ($categories as $key => $item) {
        if ($item->parent_id == $parent_id) {
            echo '<option  value="' . $item->id . '">' . $char . $item->name . '</option>';
            unset($categories[$key]);
            showCategories($categories, $item->id, $char . '&nbsp;&nbsp;&nbsp;&nbsp;');
        }
    }
}
function edit($categories,$category, $parent_id = 0, $char = '')
{
    foreach ($categories as $key => $item) {
        if ($item->parent_id == $parent_id) {
            echo '<option '.($category->parent_id == $item->id ? "selected" : "").' value="' . $item->id . '">' . $char . $item->name . '</option>';
            unset($categories[$key]);
            edit($categories,$category, $item->id, $char . '-- ');
        }
    }
}

?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{isset($category) ? 'Cập nhật danh mục' : 'Thêm mới'}}</h3>
    </div>
    <form action="{{isset($category)
        ? route('admin.categories.postUpdate', $category->id)
        : route('admin.categories.postCreate') }}" method="post" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Tên danh mục</label>
                <input type="text" class="form-control" name="name" placeholder="Tên danh mục" value="{{isset($category) ? $category->name : ''}}">
            </div>
            <div class="form-group">
                <label for="parent_id">Cấp danh mục</label>
                <select name="parent_id" class="form-control" id="parent_id">
                    @if(isset($category))
                    <option {{($category->parent_id == 0) ? 'selected' : ''}} value="0">Danh mục cha</option>
                    <?php if (isset($category_list_parent)) {
                        edit($category_list_parent, $category);
                    }
                    ?>
                    @else
                    <option value="0">Danh mục cha</option>
                    <?php if (isset($category_list_parent)) {
                        showCategories($category_list_parent);
                    }
                    ?>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="type">Loại danh mục</label>
                <select name="type" class="form-control" id="type">
                    @if(isset($category))
                    <option {{($category->type == 0) ? 'selected' : ''}} value="0">Danh mục sản phẩm</option>
                    <option {{($category->type == 1) ? 'selected' : ''}} value="1">Danh mục blog</option>
                    @else
                    <option value="0">Danh mục sản phẩm</option>
                    <option value="1">Danh mục blog</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="content">Mô tả</label>
                <textarea name="content" class="form-control" placeholder="Nhập vào mô tả..." value="{{isset($category) ? $category->content : ''}}">{{isset($category) ? $category->content : ''}}</textarea>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary col-1">Submit</button>
            <button type="reset" class="btn btn-warning col-1">Reset</button>
        </div>
    </form>
</div>


<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                <form class="input-group input-group-sm" style="width: 150px;" action="#" method="get">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên DM</th>
                        <th>Mô Tả</th>
                        <th>Trạng Thái</th>
                        <th>Loại</th>
                        <th class="text-center" colspan="2"><a class="btn btn-success" href="{{route('admin.categories.list')}}">Tạo mới</a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($category_list as $item)
                    <tr style="line-height:80px;">
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->content}}</td>
                        @if($item->status == 1)
                        <td>
                            <form action="{{route('admin.categories.upStatus', $item->id)}}" method="post">
                                @csrf
                                <button class="btn btn-success" type="submit">Hiện</button>
                            </form>
                        </td>
                        @else
                        <td>
                            <form action="{{route('admin.categories.upStatus', $item->id)}}" method="post">
                                @csrf
                                <button class="btn btn-warning" type="submit">Ẩn</button>
                            </form>
                        </td>
                        @endif
                        @if($item->type == 1)
                        <td>
                            <form action="{{route('admin.categories.upStatus', $item->id)}}" method="post">
                                @csrf
                                <button class="btn btn-success" type="submit">Blog</button>
                            </form>
                        </td>
                        @else
                        <td>
                            <form action="{{route('admin.categories.upStatus', $item->id)}}" method="post">
                                @csrf
                                <button class="btn btn-warning" type="submit">sản phẩm</button>
                            </form>
                        </td>
                        @endif
                        <td class="text-right">
                            <form action="{{route('admin.categories.getUpdate', $item->id)}}" class="form-group" method="get">
                                @csrf
                                <button class="btn btn-info">
                                    <i class="fas fa-edit left"></i>
                                </button>

                            </form>
                        </td>
                        <td class="text-left">
                            <form action="{{route('admin.categories.delete', $item->id)}}" class="form-group" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Xóa thương hiệu đồng sẽ xóa toàn bộ sản phẩm có liên quan.\nBạn chắc chứ?')" type="submit">
                                    <i class="fas fa-trash right"></i>
                                </button>

                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div>
    {{$category_list->links()}}
</div>
@endsection