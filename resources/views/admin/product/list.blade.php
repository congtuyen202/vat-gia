@extends('admin.layout.main')
@section('title', 'Sản phẩm')
@section('content-header', 'Sản phẩm')
@section('nav-right', 'sản phẩm')
@section('content-main')

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <a href="{{route('admin.products.getCreate')}}" class="btn btn-success">Tạo mới sản phẩm</a>
            </h3>
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
                        <th>Tên SP</th>
                        <th>Giá</th>
                        <th>Giá KM</th>
                        <th>Ảnh SP</th>
                        <th>Danh Mục</th>
                        <th>Thương Hiệu</th>
                        <th>Số Lượng</th>
                        <th>Trạng Thái</th>
                        <th class="text-center">Chức Năng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product_list as $item)
                        <tr style="line-height:80px;">
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{number_format($item->price, 0, '', ' ')}}</td>
                            <td>{{number_format($item->price_sale, 0, '', ' ')}}</td>
                            <td><img src="{{asset($item->images)}}" alt="" width="100"></td>
                            <td>{{$item->category->name}}</td>
                            <td>{{$item->brand->name}}</td>
                            <td>{{$item->quantity}}</td>
                            @if($item->status == 1)
                            <td>
                                <form action="{{route('admin.products.upStatus', $item->id)}}" method="post">
                                    @csrf
                                    <button class="btn btn-success" type="submit">Hiện</button>
                                </form>
                            </td>
                            @else
                            <td>
                                <form action="{{route('admin.products.upStatus', $item->id)}}" method="post">
                                    @csrf
                                    <button class="btn btn-warning" type="submit">Ẩn</button>
                                </form>
                            </td>
                            @endif
                            <td class="text-right">
                                <form action="{{route('admin.products.getUpdate', $item->id)}}" class="form-group" method="get">
                                    @csrf
                                    <button class="btn btn-info">
                                        <i class="fas fa-edit left"></i>
                                    </button>

                                </form>
                            </td>
                            <td class="text-left">
                                <form action="{{route('admin.products.delete', $item->id)}}" class="form-group" method="post">
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


@endsection