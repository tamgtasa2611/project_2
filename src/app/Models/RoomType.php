<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

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

    public static function getRoomTypes()
    {
        return DB::table('room_types')
            ->leftJoin('rooms', 'room_types.id', '=', 'rooms.room_type_id')
            ->select('room_types.*', DB::raw('COUNT(rooms.room_type_id) as room_quantity'))
            ->groupBy('id', 'name', 'base_price')
            ->get();
    }
}
