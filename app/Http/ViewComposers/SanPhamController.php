<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
class SanPhamController {
    public function compose (View $view): void
    {
        $query = DB::table("loaisanpham")->get();
        $view -> with('list',$query);
    }

}

