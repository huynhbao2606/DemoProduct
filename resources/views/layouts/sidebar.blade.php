<aside class="col-2">
    <div>
        <a class="h5 text-decoration-none text-black fw-bold" href="{{url('add-product')}}"><i class="fa-solid fa-plus"></i> Thêm Sản Phẩm</a>
    </div>
    <hr>
    <div>
        <a class="h6 text-decoration-none text-black fw-bold" href="{{url('all')}}"><i class="fa-solid fa-list"></i> Danh Sách Sản Phẩm</a>
    </div>
    <hr>
    <div class="list-group" id="list-tab" role="tablist">
{{--        @foreach($list as $ds)--}}
{{--            <a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="{{url('list-cate/' . $ds -> MaLoai)}}">{{$ds -> TenLoai}}</a>--}}
{{--        @endforeach--}}
        <a class="list-group-item list-group-item-action {{'list-cate/1' == request()->path() ? 'active bg-dark border-dark' : ''}} " id="list-home-list" data-toggle="list" href="/list-cate/1">Thực Phẩm</a>
        <a class="list-group-item list-group-item-action {{'list-cate/2' == request()->path() ? 'active bg-dark border-dark' : ''}}" id="list-home-list" data-toggle="list" href="/list-cate/2 ">Thời Trang</a>
        <a class="list-group-item list-group-item-action {{'list-cate/3' == request()->path() ? 'active bg-dark border-dark' : ''}}" id="list-home-list" data-toggle="list" href="/list-cate/3">Mỹ Phẩm</a>
    </div>
</aside>

