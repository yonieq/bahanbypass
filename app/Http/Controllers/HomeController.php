<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Jalur;
use App\Models\Pendaki;
use App\Models\Perlengkapan;
use App\Models\Regu;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::count();
        $pendaki = Pendaki::count();
        $regu = Regu::count();
        $perlengkapan = Perlengkapan::count();
        $jalur = Jalur::count();
        // return view('home');
        return view('home', compact(['user','pendaki', 'regu', 'perlengkapan', 'jalur']));
    }
}
