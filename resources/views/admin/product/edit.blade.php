@extends('admin.layout.main')
@section('title', 'Sản phẩm')
@section('content-header', 'Sản phẩm')
@section('nav-right', 'sản phẩm')
@section('content-main')


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Sửa sản phẩm</h3>
    </div>
    <form action="{{route('admin.products.postUpdate', $product->id)}}" method="post" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input type="text" class="form-control" name="name" value="{{$product->name}}" placeholder="Tên sản phẩm">
            </div>
            <div class="form-group">
                <label for="price">Giá</label>
                <input type="text" class="form-control" name="price" value="{{$product->price}}" placeholder="Nhập vào giá sản phẩm">
            </div>
            <div class="form-group">
                <label for="price_sale">Giá sale</label>
                <input type="text" class="form-control" name="price_sale" value="{{$product->price_sale}}" placeholder="Tên sản phẩm">
            </div>
            <div class="form-group">
                <label for="quantity">Số lượng</label>
                <input type="number" class="form-control" name="quantity" value="{{$product->quantity}}" placeholder="Số lượng sản phẩm">
            </div>
            <div class="form-group">
                <label for="cat_id">Danh mục</label>
                <select class="form-control" name="cat_id" value="{{$product->cat_id}}">
                    <?php if (isset($category_list)) {
                        edit($category_list, $product);
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Thương hiệu</label>
                <select class="form-control" name="brand_id">
                    <?php if (isset($brand_list)) {
                        edit($brand_list, $product);
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Ảnh sản phẩm</label>
                <img class="" src="{{asset($product->images)}}" name="avatar" alt="" width="250px">
                <input type="hidden" class="form-control" value="{{$product->images}}" name="images" aria-describedby="images">
                <input type="file" class="form-control" value="" name="images_up" aria-describedby="images_up">
            </div>
            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea name="description" class="form-control" value="{{$product->description}}" placeholder="Nhập vào mô tả">{{$product->description}}</textarea>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary col-1">Submit</button>
            <button type="reset" class="btn btn-warning col-1">Reset</button>
        </div>
    </form>
</div>
<?php
function edit($categories, $category, $parent_id = 0, $char = '')
{
    foreach ($categories as $key => $item) {
        if ($item->parent_id == $parent_id) {
            echo '<option ' . ($category->parent_id == $item->id ? "selected" : "") . ' value="' . $item->id . '">' . $char . $item->name . '</option>';
            unset($categories[$key]);
            edit($categories, $category, $item->id, $char . '-- ');
        }
    }
}

?>

@endsection