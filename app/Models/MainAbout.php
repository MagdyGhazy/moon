<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainAbout extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'discription',
        'image',
    ];
}
