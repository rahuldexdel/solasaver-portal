<?php

// app/Models/Installation.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Installation extends Model
{
    protected $fillable = ['order_id', 'installer_id', 'customer_id', 'status', 'scheduled_date', 'notes', 'completed_at'];
    protected $casts = ['scheduled_date' => 'date', 'completed_at' => 'datetime'];

    public function order(): BelongsTo { return $this->belongsTo(Order::class); }
    public function installer(): BelongsTo { return $this->belongsTo(User::class, 'installer_id'); }
    public function customer(): BelongsTo { return $this->belongsTo(User::class, 'customer_id'); }
}