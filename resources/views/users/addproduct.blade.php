@extends("layouts.master")
@section('main')
<h4 class="text-center fw-bold">Thêm Sản Phẩm</h4>
@if(session()->has('success'))
    <div class="alert alert-success text-success fw-bolder">
        {{session()->get('success') }}
    </div>
@else
    <div class="alert alert-danger text-danger fw-bolder">
        Vui Lòng Kiểm Tra Dữ Liệu
    </div>
@endif
<hr>
<form action="/add-product" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group w-50 m-auto fw-bolder">
        <label for="TenSP">Tên Sản Phẩm</label>
        <input type="text" class="form-control" id="TenSP" name="TenSP" placeholder="Nhập Tên Sản Phẩm" value="{{old('TenSP')}}">
        @error('TenSP')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group w-50 m-auto fw-bolder">
        <label for="Gia">Giá</label>
        <input type="number" class="form-control" id="Gia" name="Gia" placeholder="Nhập Giá" min="1" value="{{old('Gia')}}">
        @error('Gia')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group w-50 m-auto fw-bolder">
        <label for="Hình">Hình</label>
        <input type="file" class="form-control" id="Hinh" name="Hinh" placeholder="Thêm Hình">
    </div>
    <div class="form-group w-50 m-auto fw-bolder">
        <label for="date">Ngày Tạo</label>
        <input type="date" class="form-control" id="date" name="Date" placeholder="Chọn Ngày Tạo" value="{{old('Date')}}">
        @error('Date')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group w-50 m-auto fw-bolder">
        <label for="Muc">Mã Loại</label>
        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="MaLoai">
            <option selected value="{{old('MaLoai')}}">Chọn Mã Loại</option>
            @foreach($add as $ds)
                <option value="{{$ds -> MaLoai}}">{{$ds -> TenLoai}}</option>
            @endforeach
        </select>
        @error('MaLoai')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group w-50 m-auto mt-2 fw-bolder">
        <button type="submit" class="btn btn-dark fw-bolder">Thêm Sản Phẩm</button>
    </div>
</form>
@endsection
