<?php

namespace App\Http\Controllers;

use App\Models\RepairRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RepairRequestController extends Controller
{
    public function index(): View
    {
        $repairRequests = auth()->user()->repairRequests()->latest()->get();

        return view('repair-requests.index', compact('repairRequests'));
    }

    public function create(): View
    {
        $technicians = User::query()->where('role', User::ROLE_TECHNICIAN)->get();

        return view('repair-requests.create', compact('technicians'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'item_name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'preferred_date' => ['nullable', 'date'],
            'service_location' => ['required', 'string', 'max:255'],
            'preferred_technician' => ['nullable', 'string', 'max:255'],
        ]);

        $validated['customer_id'] = auth()->id();
        $validated['status'] = 'Pending';
        $validated['estimated_weight_kg'] = match ($validated['category']) {
            'Smartphones' => 0.2,
            'Laptops' => 2.5,
            'Computers' => 8,
            'Household Appliances' => 12,
            'Furniture' => 15,
            'Bicycles' => 12,
            default => 1,
        };

        RepairRequest::create($validated);

        return redirect()->route('repair-requests.index')->with('success', 'Repair request submitted successfully.');
    }
}
