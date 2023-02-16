<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class SanPhamController extends Controller
{

    public function index()
    {

        $query = DB::table("sanpham")
            ->get();
        return view("users.home")->with('list', $query);
    }

    public function listCate($MaLoai)
    {
        $query = DB::table("sanpham")
            ->where('MaLoai', '=', $MaLoai)
            ->get();
        return view('users.category')->with('listCate', $query);
//        $query = DB::table("loaisanpham")
//            ->where('TenLoai', '=', $TenLoai)
//            ->get();
//        return view('users.category')->with('listCate', $query);
    }
    public function all()
    {
        $query = DB::table("sanpham")
            ->get();
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
        return redirect('/');
    }
}


