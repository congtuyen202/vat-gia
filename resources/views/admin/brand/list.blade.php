@extends('admin.layout.main')
@section('title', 'Thương hiệu')
@section('content-header', 'Thương hiệu')
@section('nav-right', 'Thương hiệu')
@section('content-main')

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <a href="{{route('admin.brands.getCreate')}}" class="btn btn-success">Thêm mới</a>
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
                        <th>Tên Thương Hiệu</th>
                        <th>Mô Tả</th>
                        <th>Trạng Thái</th>
                        <th class="text-center" colspan="2">Chức Năng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $item)
                    <tr style="line-height:80px;">
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td class="col-2">{!! $item->content !!}</td>
                        @if($item->status == 1)
                        <td>
                            <form action="{{route('admin.brands.upStatus', $item->id)}}" method="post">
                                @csrf
                                <button class="btn btn-success" type="submit">Hiện</button>
                            </form>
                        </td>
                        @else
                        <td>
                            <form action="{{route('admin.brands.upStatus', $item->id)}}" method="post">
                                @csrf
                                <button class="btn btn-warning" type="submit">Ẩn</button>
                            </form>
                        </td>
                        @endif
                        <td class="text-right">
                            <form action="{{route('admin.brands.getUpdate', $item->id)}}" class="form-group" method="get">
                                @csrf
                                <button class="btn btn-info">
                                <i class="fas fa-edit left"></i>
                                </button>

                            </form>
                        </td>
                        <td class="text-left">
                            <form action="{{route('admin.brands.delete', $item->id)}}" class="form-group" method="post">
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
<div class="right">
    {{$brands->links()}}
</div>
@endsection