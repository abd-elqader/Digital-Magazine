<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'magazine_id','publish_at'];

    public function magazine()
    {
        return $this->belongsTo(Magazine::class);
    }
}
