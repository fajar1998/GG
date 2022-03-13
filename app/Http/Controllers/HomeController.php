<?php

namespace App\Http\Controllers;

use App\Models\Doku;
use App\Models\Kategori;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');;
        $data['total']= User::count();
        $data['totalunit']= Unit::count();
        $data['totaldoku']= Doku::count();
        $data['totalkat']= Kategori::count();
        return view('Beranda.home',$data);
    }
}
