<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penghulu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'status',
    ];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}