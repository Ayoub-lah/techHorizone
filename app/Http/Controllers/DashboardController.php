<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Get counts for each role
        $totalAdmins = DB::table('users')->where('role', 0)->count();
        $totalCustomers = DB::table('users')->where('role', 2)->count();
        $totalResponsables = DB::table('users')->where('role', 1)->count();
        $totaleArticles = DB::table('articles')->count();
        $totaleThemes = DB::table('themes')->count();
        $totaleMagazines = DB::table('magazines')->count();
        return view('admin.layout.dash', compact('totalAdmins', 'totalCustomers', 'totalResponsables' , 'totaleArticles' , 'totaleThemes' ,'totaleMagazines'));
    }
}
