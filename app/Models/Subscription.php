<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'magazine_id','subscription_start_date','subscription_end_date'];

    const STATUS = ['active', 'finished', 'pending'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function magazine()
    {
        return $this->hasMany(Magazine::class);
    }
}
