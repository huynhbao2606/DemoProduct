@extends('layouts.master')
@section("main")
    <h4>Danh Sách Sản Phẩm</h4>
    <hr>
    <table class="table table-bordered border-dark table-hover">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên Sản Phẩm</th>
            <th scope="col">Giá</th>
            <th scope="col">Hình</th>
            <th scope="col">Ngày Tạo</th>
            <th scope="col">Mã Loại</th>
        </tr>
        </thead>
        <tbody>
        @foreach($all as $index => $ds)
            <tr>
                <th>{{$index}}</th>
                <td>{{$ds -> TenSP}}</td>
                <td>{{number_format($ds -> Gia,0) }}đ</td>
                <td><img class="card-img-top" src="{{asset('uploads/'.$ds -> Hinh)}}" alt="Chưa Thêm Hình" width="50" height="50"></td>
                <td>{{$ds -> NgayTao}}</td>
                <td>{{$ds -> MaLoai}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
