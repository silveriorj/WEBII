<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Socio;

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
        $socios = Socio::all();
        
        return view('socios')->with('socios', $socios);
    }
}
