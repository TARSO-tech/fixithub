<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Message;
use App\Models\RepairRequest;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = $request->user();
        $repairRequests = RepairRequest::query()
            ->where('customer_id', $user->id)
            ->latest()
            ->limit(5)
            ->get();
        $repairCount = RepairRequest::query()->where('customer_id', $user->id)->count();
        $completedRepairs = RepairRequest::query()
            ->where('customer_id', $user->id)
            ->where('status', 'Completed')
            ->count();
        $appointments = Appointment::query()
            ->with(['customer', 'technician'])
            ->where(function ($query) use ($user) {
                $query->where('customer_id', $user->id)
                    ->orWhere('technician_id', $user->id);
            })
            ->orderBy('appointment_date')
            ->orderBy('appointment_time')
            ->limit(5)
            ->get();
        $appointmentCount = Appointment::query()
            ->where(function ($query) use ($user) {
                $query->where('customer_id', $user->id)
                    ->orWhere('technician_id', $user->id);
            })
            ->whereIn('status', ['Pending', 'Accepted', 'Confirmed', 'Scheduled'])
            ->count();
        $unreadMessages = Message::query()
            ->where('recipient_id', $user->id)
            ->whereNull('read_at')
            ->count();
        $wasteAvoided = RepairRequest::query()
            ->where('customer_id', $user->id)
            ->where('status', 'Completed')
            ->sum('estimated_weight_kg');
        $technicianCount = User::query()
            ->where('role', User::ROLE_TECHNICIAN)
            ->where('is_verified', true)
            ->count();

        return view('dashboard', compact(
            'user',
            'repairRequests',
            'repairCount',
            'completedRepairs',
            'appointments',
            'appointmentCount',
            'unreadMessages',
            'wasteAvoided',
            'technicianCount',
        ));
    }
}
