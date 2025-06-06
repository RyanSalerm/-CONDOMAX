<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'condominium_id',
        'maintenance_date',
        'due_months',
        'repeat_months',
        'priority',
        'status',
        'situation',
        'notes',
        'provider_id',
    ];

    public function condominium()
    {
        return $this->belongsTo(Condominium::class);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}