<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Auth;
use Session;

class ListUserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('admin');
    }

    9//
    public function countCountries(){
        $count = User::select(DB::raw('country, count(*) as users_count'))
                    ->groupBy('country')
                    ->orderBy('users_count', 'desc')
                    ->get();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(){
        $usrs = User::orderBy('id')->paginate(10);
        return view('list_user', compact('usrs'));
    }
}
