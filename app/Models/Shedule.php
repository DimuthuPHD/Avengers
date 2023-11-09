<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shedule extends Model
{
    use HasFactory;

    protected $fillable = ['route_id', 'bus_id', 'departure_at', 'arrive_at', 'notes','status'];

    public function bus(){
        return $this->belongsTo(Bus::class);
    }

    public function route(){
        return $this->belongsTo(Route::class);
    }
}
