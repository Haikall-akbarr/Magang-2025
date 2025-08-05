<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'penghulu_id',
        'bride_name',
        'groom_name',
        'wedding_date',
        'confirmed_date',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function penghulu()
    {
        return $this->belongsTo(Penghulu::class);
    }
}