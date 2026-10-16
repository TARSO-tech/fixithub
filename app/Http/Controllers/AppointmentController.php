<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AppointmentController extends Controller
{
    public function index(): View
    {
        $appointments = Appointment::query()
            ->with(['customer', 'technician'])
            ->where(function ($query) {
                $query->where('customer_id', auth()->id())
                    ->orWhere('technician_id', auth()->id());
            })
            ->latest()
            ->get();

        return view('appointments.index', compact('appointments'));
    }

    public function create(): View
    {
        $technicians = User::query()->where('role', User::ROLE_TECHNICIAN)->get();

        return view('appointments.create', compact('technicians'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'technician_id' => ['required', 'exists:users,id'],
            'appointment_date' => ['required', 'date'],
            'appointment_time' => ['required', 'date_format:H:i'],
            'notes' => ['nullable', 'string', 'max:500'],
        ]);

        $technician = User::query()
            ->whereKey($validated['technician_id'])
            ->where('role', User::ROLE_TECHNICIAN)
            ->first();

        if (! $technician) {
            throw ValidationException::withMessages([
                'technician_id' => 'Choose a valid technician.',
            ]);
        }

        $hasConflict = Appointment::query()
            ->where('technician_id', $technician->id)
            ->where('appointment_date', $validated['appointment_date'])
            ->where('appointment_time', $validated['appointment_time'])
            ->whereIn('status', ['Pending', 'Accepted', 'Confirmed'])
            ->exists();

        if ($hasConflict) {
            throw ValidationException::withMessages([
                'appointment_time' => 'That time is no longer available. Choose another appointment time.',
            ]);
        }

        $validated['customer_id'] = auth()->id();
        $validated['status'] = 'Pending';

        Appointment::create($validated);

        return redirect()->route('appointments.index')->with('success', 'Appointment request sent.');
    }
}
