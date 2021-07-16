<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){

    // $diaActual=Carbon::now();
    // $actualmes=$diaActual->subMonths(1);

    $users = User::orderBy('id','desc')->take(8)->get();

        return view('admin.index',compact('users'));
    }
}
