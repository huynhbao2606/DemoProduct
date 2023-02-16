@extends('layouts.master')
@section("main")
    <h4>Sản Phẩm</h4>
    <hr>
    <div class="row">
        @foreach($listCate as $ds)
            <div class="card col-4 mb-2 border border-dark" >
                <img class="card-img-top" src="{{asset('uploads/'.$ds -> Hinh)}}" alt="Chưa Thêm Hình" width="262" height="270">
                <div class="card-body">
                    <h5 class="card-title">{{$ds -> TenSP}}</h5>
                    <div style="font-weight: bolder">{{number_format($ds -> Gia,0) }}đ</div>
                    <a href="#" class="btn btn-dark"><i class="fa-solid fa-cart-shopping"></i></a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
