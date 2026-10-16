<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class TechnicianController extends Controller
{
    public function index(): View
    {
        $technicians = User::query()
            ->where('role', User::ROLE_TECHNICIAN)
            ->where('is_verified', true)
            ->get();

        return view('technicians.index', compact('technicians'));
    }

    public function show(string $id): View
    {
        $technician = User::query()->findOrFail($id);

        return view('technicians.show', compact('technician'));
    }
}
