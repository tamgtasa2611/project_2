<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;
    protected $table = 'roomTypes';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'description'
    ];
}
