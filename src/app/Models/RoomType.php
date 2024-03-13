<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RoomType extends Model
{
    use HasFactory;

    protected $table = 'room_types';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'base_price'
    ];

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }
}
