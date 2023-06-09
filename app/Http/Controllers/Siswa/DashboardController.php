<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['title'] = "Dashboard Siswa";
        return view("siswa.dashboard", $data);
    }
}
