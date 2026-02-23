<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;

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
        if (Auth::user()->roles->first()->name == 'admin') {
            //ketika user hak akses admin -> maka diarahkan ke route admin dashboard
            return redirect()->route('admin.dashboard');
        }elseif (Auth::user()->roles->first()->name == 'viewer') {
            //ketika user hak akses viewer -> maka diarahkan ke route viewer dashboard
             return redirect()->route('viewer.dashboard');
        }else {
            //ketika bukan viewer / admin -> maka kita arahkian ke halaman awal / login
            return redirect()->route('login');
        }
    }

    //Role Admin jika sudah login arahkan ke view home
    public function admin()
    {
        //Judul Halaman
        $title = 'Dashboard Statistik';

        //Mengambil jumlah data dari masing-masing tabel
        $sum_categories = Category::get()->count();
        $sum_suppliers = Supplier::get()->count();
        $sum_products = Product::get()->count();
        $sum_users = User::get()->count();

        //tampilkan view admin.dashboard dengan tersebut
        return view('admin.dashboard',compact('title','sum_categories','sum_suppliers','sum_products','sum_users'));
    }

     //Role Viewer jika sudah login arahkan ke view welcome
     public function viewer()
     {
        $title = 'Dashboard Statistik';

        $sum_categories = Category::get()->count();
        $sum_suppliers  = Supplier::get()->count();
        $sum_products = Product::get()->count();
        $sum_users = User::get()->count();

        return view('viewer.dashboard', compact('title','sum_categories','sum_suppliers','sum_products','sum_users'));
     }

}