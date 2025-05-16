<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Car;

class Rental extends Model
{
    /** @use HasFactory<\Database\Factories\RentalFactory> */
    use HasFactory;

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function cars(){
        return $this->belongsTo(Car::class);
    }
}
