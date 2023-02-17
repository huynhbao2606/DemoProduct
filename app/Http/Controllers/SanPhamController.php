<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class SanPhamController extends Controller
{

    public function index()
    {
        if(request()->search){
            $query = DB::table("sanpham")
                ->where('Gia', '<=', request()->search)
                ->get();
        }else{
            $query = DB::table("sanpham")
                ->get();
        }
        return view("users.home")->with('list', $query);
    }

    public function listCate($MaLoai)
    {
        if(request()->search){
            $query = DB::table("sanpham")
                ->join('loaisanpham','sanpham.MaLoai','=','loaisanpham.MaLoai')
                ->where('Gia', '<=', request()->search)
                ->where('sanpham.MaLoai', '=', $MaLoai)
                ->get();
        }else{
            $query = DB::table("sanpham")
                ->join('loaisanpham','sanpham.MaLoai','=','loaisanpham.MaLoai')
                ->where('sanpham.MaLoai', '=', $MaLoai)
                ->get();
        }
//        $TenLoaiSanPham = DB::table('loaisanpham')->select('TenLoai')->where('MaLoai',$MaLoai)->first();
        return view('users.category')->with('listCate', $query);
    }
    public function all()
    {
        if(request()->search){
            $query = DB::table("sanpham")
                ->where('Gia', '<=', request()->search)
                ->get();
        }else{
            $query = DB::table("sanpham")
                ->join('loaisanpham','sanpham.MaLoai','=','loaisanpham.MaLoai')
                ->get();
        }
        return view('users.list')->with('all', $query);
    }
    public function search(Request $request)
    {
        $search = $request['search'];
        if ($search != "") {
            $query = DB::table('sanpham')
                ->where('Gia', '<=', $search)
                ->get();
        }else {
            $query = DB::table('sanpham')
                ->get();
        }
        return view('users.search')->with('search',$query);
    }
    public function addproduct(){
        $query = DB::table("loaisanpham")->get();
        return view('users.addproduct')->with('add', $query);
    }
    public function addproductpost(Request $request){
        $validated = $request->validate([
            'TenSP' => 'required',
            'Gia' => 'required|numeric',
            'Date' => 'required',
            'MaLoai' => 'required',
        ],
            $message = [
            'TenSP.required' => 'Vui Lòng Nhập Tên Sản Phẩm',
            'Gia.required' => 'Vui Lòng Nhập Giá Sản Phẩm',
                'Gia.numeric' => 'Vui Lòng Nhấp Giá Bằng Số',
                'Gia.max' => 'Giá Sản Phẩm Quá Cao',
                'Date' => 'Vui Lòng Chọn Ngày Tạo',
                'MaLoai' => 'Vui Lòng Chọn Loại Sản Phẩm'
        ]);
        $TenSP = $request->post('TenSP');
        $Gia = $request->post('Gia');
        $Hinh = "";
        if($request->hasFile('Hinh')){
            $file = $request->file('Hinh');
            $ext = $request->file('Hinh')->extension();
            $Hinh = 'images/'.time().'.'.$ext;
            $file->move(public_path('uploads/images'),$Hinh);
        }
        $Date = $request->post('Date');
        $MaLoai = $request->post('MaLoai');
        DB::table("sanpham")->insert(['TenSP'=>$TenSP,'Gia'=>$Gia,'Hinh'=>$Hinh,'NgayTao'=>$Date,'MaLoai'=>$MaLoai]);
        return redirect('/add-product')->with('success','Thêm Sản Phẩm Thành Công');
    }
}


