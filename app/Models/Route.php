<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'from', 'to', 'status'];

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function shedules(){
        return $this->hasMany(Shedule::class);
    }
}
