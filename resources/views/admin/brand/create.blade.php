@extends('admin.layout.main')
@section('title', 'Thương hiệu')
@section('content-header', 'Thương hiệu')
@section('nav-right', 'Thương hiệu')
@section('content-main')


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Thêm mới thương hiệu</h3>
    </div>
    <form action="{{isset($brand)
        ? route('admin.brands.postUpdate', $brand->id)
        : route('admin.brands.postCreate') }}"
        method="post" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Tên thương hiệu</label>
                <input type="text" class="form-control" name="name" placeholder="Tên thương hiệu" value="{{isset($brand) ? $brand->name : ''}}">
            </div>
            <div class="form-group">
                <label for="name">Mô tả</label>
                <textarea name="content" class="form-control" placeholder="Nhập vào mô tả..." value="{{isset($brand) ? $brand->name : ''}}">{{isset($brand) ? $brand->content : ''}}</textarea>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary col-1">Submit</button> 
            <button type="reset" class="btn btn-warning col-1">Reset</button>
        </div>
    </form>
</div>
@endsection