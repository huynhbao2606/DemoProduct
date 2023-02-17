<aside class="col-2">
    <div>
        <a class="h5 text-decoration-none fw-bold {{'add-product' == request()->path() ? 'text-success' : 'text-dark'}}" href="/add-product"><i class="fa-solid fa-plus"></i> Thêm Sản Phẩm</a>
    </div>
    <hr>
    <div>
        <a class="h6 text-decoration-none fw-bold {{'all' == request()->path() ? 'text-success' : 'text-dark'}}" href="{{url('all')}}"><i class="fa-solid fa-list"></i> Danh Sách Sản Phẩm</a>
    </div>
    <hr>
    <div class="list-group" id="list-tab" role="tablist">
        @foreach($list as $ds)
            <a class="list-group-item list-group-item-action {{'list-cate/'. $ds -> MaLoai == request()->path() ? 'active bg-dark border-dark fw-bolder' : ''}}" id="list-home-list" data-toggle="list" href="{{url('list-cate/' . $ds -> MaLoai)}}">{{$ds -> TenLoai}}</a>
        @endforeach
    </div>
</aside>

