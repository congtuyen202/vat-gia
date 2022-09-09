@extends('admin.layout.main')
@section('title', 'Home')
@section('content-header', 'Thống kê')
@section('nav-right', 'Thống kê')
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
                    <tr style="line-height:80px;">
                        <td>1</td>
                        <td>Ổ cứng SSD 128GB Lexar NS100 2.5-Inch SATA III</td>
                        <td>{{number_format(800000, 2, ',', ' ')}}</td>
                        <td>399.000</td>
                        <td><img src="https://tuanphong.vn/pictures/full/2019/01/1546831917-691-o-cung-ssd-128gb-lexar-ns100-2.jpg" alt="" width="100"></td>
                        <td>Ổ cứng SSD 2.5-Inch</td>
                        <td>Lexar</td>
                        <td>100</td>
                        <td>
                            <form action="#" method="post">
                                <button class="btn btn-warning " type="submit">Hiện</button>
                            </form>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-info" type="submit">
                                <i class="fas fa-edit left"></i>
                            </button>
                            <button class="btn btn-danger" type="submit">
                                <i class="fas fa-trash right"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection