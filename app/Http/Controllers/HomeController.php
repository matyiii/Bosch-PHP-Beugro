<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        
    }

    public function production()
    {
        $productionRows = DB::table('production')->get();
        $productRows = DB::table('products')->get();
        return view('production',['productionRows'=>$productionRows,'productRows'=>$productRows]);
    }

    public function delete($id){
        DB::table('production')->where('id', $id)->delete();
        return redirect('production');
    }

    public function about(){
        return view('about');
    }
}
