<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function home(Request $request)
    {
        return view('home', [
            //
        ]);
    }

    public function licenses()
    {
        return view('licenses');
    }

    public function changelog()
    {
        return view('changelog');
    }
    
}
