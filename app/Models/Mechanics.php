<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use App\Models\Cars;
use App\Models\Owners;

class Mechanics extends Model
{
    use HasFactory;

    protected $table = 'mechanics';

    /**
     * Get the car's owner.
     */
    public function carOwner(): HasOneThrough
    {
        return $this->hasOneThrough(Owners::class, Cars::class, 'mechanic_id', 'car_id', 'id', 'id');
    }
}
