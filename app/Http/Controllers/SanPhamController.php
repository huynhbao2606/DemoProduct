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
            'TenSP.required' => 'Vui L??ng Nh???p T??n S???n Ph???m',
            'Gia.required' => 'Vui L??ng Nh???p Gi?? S???n Ph???m',
                'Gia.numeric' => 'Vui L??ng Nh???p Gi?? B???ng S???',
                'Gia.max' => 'Gi?? S???n Ph???m Qu?? Cao',
                'Date' => 'Vui L??ng Ch???n Ng??y T???o',
                'MaLoai' => 'Vui L??ng Ch???n Lo???i S???n Ph???m'
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
        return redirect('/add-product')->with('success','Th??m S???n Ph???m Th??nh C??ng');
    }
}


