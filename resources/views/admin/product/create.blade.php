@extends('admin.layout.main')
@section('title', 'Sản phẩm')
@section('content-header', 'Sản phẩm')
@section('nav-right', 'sản phẩm')
@section('content-main')


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Tạo mới sản phẩm</h3>
    </div>
    <form action="{{route('admin.products.postCreate')}}" method="post" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input type="text" class="form-control" name="name" placeholder="Tên sản phẩm">
            </div>
            <div class="form-group">
                <label for="price">Giá</label>
                <input type="text" class="form-control" name="price" placeholder="Nhập vào giá sản phẩm">
            </div>
            <div class="form-group">
                <label for="price_sale">Giá sale</label>
                <input type="text" class="form-control" name="price_sale" placeholder="Tên sản phẩm">
            </div>
            <div class="form-group">
                <label for="quantity">Số lượng</label>
                <input type="number" class="form-control" name="quantity" placeholder="Số lượng sản phẩm">
            </div>
            <div class="form-group">
                <label for="cat_id">Danh mục</label>
                <select class="form-control" name="cat_id">
                    <?php if (isset($category_list)) {
                        showCategories($category_list);
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Thương hiệu</label>
                <select class="form-control" name="brand_id">
                    <?php if (isset($brand_list)) {
                        showCategories($brand_list);
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Ảnh sản phẩm</label>
                <input type="file" name="images" class="form-control" placeholder="Tải lên ảnh sản phẩm">
            </div>
            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea name="description" class="form-control" placeholder="Nhập vào mô tả"></textarea>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary col-1">Submit</button>
            <button type="reset" class="btn btn-warning col-1">Reset</button>
        </div>
    </form>
</div>
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

?>

@endsection