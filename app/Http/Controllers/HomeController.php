<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portofolio;

class HomeController extends Controller
{
    public function index(){
        $portofolio = Portofolio::get();
        return view("index",["resource"=>$portofolio]);
    }
}
