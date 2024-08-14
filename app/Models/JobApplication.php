<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    public function alumni()
    {
        return $this->belongsTo(Alumni::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
