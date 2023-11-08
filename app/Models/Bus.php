<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'owner_name', 'owner_phone', 'owner_address', 'number_plate', 'notes', 'status'];

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function shedules(){
        return $this->hasMany(Shedule::class);
    }
}
