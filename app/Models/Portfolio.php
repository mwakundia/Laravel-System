<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'gender', 'email', 'dob', 'education', 'certificates', 'skills', 'cv', 'description', 'profile_picture'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}