<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public const ROLE_CUSTOMER = 'customer';
    public const ROLE_TECHNICIAN = 'technician';
    public const ROLE_VOLUNTEER = 'student_volunteer';
    public const ROLE_ADMIN = 'administrator';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'specialization',
        'service_area',
        'bio',
        'photo_url',
        'is_verified',
        'eco_points',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_verified' => 'boolean',
            'eco_points' => 'integer',
        ];
    }

    public function repairRequests()
    {
        return $this->hasMany(RepairRequest::class, 'customer_id');
    }

    public function appointmentsAsCustomer()
    {
        return $this->hasMany(Appointment::class, 'customer_id');
    }

    public function appointmentsAsTechnician()
    {
        return $this->hasMany(Appointment::class, 'technician_id');
    }

    public function conversations()
    {
        return $this->belongsToMany(Conversation::class, 'conversation_participants')->withTimestamps();
    }

    public function sentMessages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function isRole(string $role): bool
    {
        return $this->role === $role;
    }

    public function getDashboardRoute(): string
    {
        return match ($this->role) {
            self::ROLE_TECHNICIAN => route('technician.dashboard'),
            self::ROLE_VOLUNTEER => route('volunteer.dashboard'),
            self::ROLE_ADMIN => route('admin.dashboard'),
            default => route('dashboard'),
        };
    }
}
