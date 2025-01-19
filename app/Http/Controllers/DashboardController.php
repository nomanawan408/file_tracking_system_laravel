<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
class DashboardController extends Controller
{
    //
    public function index(){
        $newFiles = File::where('created_at', '>=', now()->subDays(7))
        ->orderBy('created_at', 'desc')
        ->get();
        // Pass the data to the view


        return view('dashboard', compact('newFiles'));
    }
}
