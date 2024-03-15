<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'capacity',
        'room_type_id',
    ];

    public function roomType(): BelongsTo
    {
        return $this->belongsTo(RoomType::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(RoomImage::class);
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class);
    }

    public static function roomSearch()
    {

    }

    public static function roomSort(int $sort)
    {
        switch ($sort) {
            case 0:
                return [
                    'by' => 'id',
                    'direction' => 'ASC'
                ];
            case 1:
                return [
                    'by' => 'id',
                    'direction' => 'ASC'
                ];
            case 2:
                return [
                    'by' => 'id',
                    'direction' => 'DESC'
                ];
            case 3:

                return [
                    'by' => 'room_types.base_price',
                    'direction' => 'ASC'
                ];
            case 4:
                return [
                    'by' => 'room_types.base_price',
                    'direction' => 'DESC'
                ];
        }
    }

    public static function roomFilter()
    {

    }

    public static function getRooms(array $search, int $sort)
    {
        $order = Room::roomSort($sort);
        return Room::with('roomType')->with('images')
            ->join('room_types', 'rooms.room_type_id', '=', 'room_types.id')
            ->select('rooms.*', 'room_types.base_price')
            ->where('capacity', '>=', $search['guest_num'] ?? 1)
            ->orderBy($order['by'], $order['direction']);
    }
}
