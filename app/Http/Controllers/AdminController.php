<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $photos=Photo::query()
            ->orderBy('id','desc')
            ->get();
        return view('admin.index', ['photos'=>$photos]);
    }
}
