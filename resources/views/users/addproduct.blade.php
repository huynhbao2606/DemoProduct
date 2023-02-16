@extends("layouts.master")
@section('main')
<h4 class="text-center fw-bold">Thêm Sản Phẩm</h4>
<hr>
<form action="add-product-post" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group w-50 m-auto">
        <label for="TenSP">Tên Sản Phẩm</label>
        <input type="text" class="form-control" id="TenSP" name="TenSP" placeholder="Nhập Tên Sản Phẩm" required>
    </div>
    <div class="form-group w-50 m-auto">
        <label for="Gia">Giá</label>
        <input type="number" class="form-control" id="Gia" name="Gia" placeholder="Nhập Giá" min="1"  required>
    </div>
    <div class="form-group w-50 m-auto">
        <label for="Hình">Hình</label>
        <input type="file" class="form-control" id="Hinh" name="Hinh" placeholder="Thêm Hình">
    </div>
    <div class="form-group w-50 m-auto">
        <label for="date">Ngày Tạo</label>
        <input type="date" class="form-control" id="date" name="Date" placeholder="Chọn Ngày Tạo" required>
    </div>
    <div class="form-group w-50 m-auto">
        <label for="Muc">Mã Loại</label>
        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="MaLoai" required>
            <option selected>Chọn Mã Loại</option>
            @foreach($add as $ds)
                <option value="{{$ds -> MaLoai}}">{{$ds -> TenLoai}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group w-50 m-auto">
        <button type="submit" class="btn btn-dark ">Thêm Sản Phẩm</button>
    </div>
</form>
@endsection
