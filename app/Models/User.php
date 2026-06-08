<?php

// app/Models/User.php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- ADD THIS IMPORT
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use Notifiable, HasRoles , HasFactory;

    protected $fillable = ['name', 'email', 'password', 'phone'];
    protected $hidden = ['password', 'remember_token'];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function installations(): HasMany
    {
        return $this->hasMany(Installation::class, 'customer_id');
    }

    public function assignedJobs(): HasMany
    {
        return $this->hasMany(Installation::class, 'installer_id');
    }
}