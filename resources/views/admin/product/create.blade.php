@extends('admin.layout.main')
@section('title', 'Sản phẩm')
@section('content-header', 'Sản phẩm')
@section('nav-right', 'sản phẩm')
@section('content-main')


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Tạo mới sản phẩm</h3>
    </div>
    <form autocomplete="off">
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
                <label for="name">Giá sale</label>
                <input type="text" class="form-control" name="price_sale" placeholder="Tên sản phẩm">
            </div>
            <div class="form-group">
                <label for="price">Danh mục</label>
                <select class="form-control" name="cat_id">
                    <option value="1">dm 1</option>
                    <option value="2">dm 2</option>
                    <option value="3">dm 3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Thương hiệu</label>
                <select class="form-control" name="brand_id">
                    <option value="1">thuong hieu 1</option>
                    <option value="2">thuong hieu 2</option>
                    <option value="3">thuong hieu 3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Ảnh sản phẩm</label>
                <input type="file" name="images" class="form-control" placeholder="Tải lên ảnh sản phẩm">
            </div>
            <div class="form-group">
                <label for="name">Mô tả</label>
                <textarea id="textarea" class="form-control" placeholder="Tên sản phẩm"></textarea>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary col-1" disabled>Submit</button>
            <button type="reset" class="btn btn-warning col-1">Reset</button>
        </div>
    </form>
</div>
<script>
    ClassicEditor
        .create(document.querySelector('#textarea'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection