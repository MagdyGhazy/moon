<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminFeed extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'comment',
    ];
    public function comments()
    {
        return $this->hasMany('App\Models\UserFeed', 'userfeedId');
    }
}
