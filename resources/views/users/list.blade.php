@extends('layouts.master')
@section("main")
    <h4 class="fw-bolder">Danh Sách Sản Phẩm</h4>
    <hr>
    <table class="table table-bordered border-dark table-hover">
        <thead>
        <tr>
            <th class="text-center" scope="col">STT</th>
            <th class="text-center" scope="col">Tên Sản Phẩm</th>
            <th class="text-center" scope="col">Giá</th>
            <th class="text-center" scope="col">Hình</th>
            <th class="text-center" scope="col">Ngày Tạo</th>
            <th class="text-center" scope="col">Tên Loại</th>
        </tr>
        </thead>
        <tbody>
        @foreach($all as $index => $ds)
            <tr>
                <th class="text-center">{{$index}}</th>
                <td class="text-center">{{$ds -> TenSP}}</td>
                <td class="text-center">{{number_format($ds -> Gia,0) }}đ</td>
                <td><img class="card-img-top" src="{{asset('uploads/'.$ds -> Hinh)}}" alt="Lỗi" width="50" height="50"></td>
                <td class="text-center">{{$ds -> NgayTao}}</td>
                <td class="text-center">{{$ds -> TenLoai}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
