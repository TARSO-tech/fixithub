<?php

namespace App\Http\Controllers;

use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $technicians = User::query()
            ->where('role', User::ROLE_TECHNICIAN)
            ->where('is_verified', true)
            ->limit(3)
            ->get();

        return view('welcome', compact('technicians'));
    }
}
