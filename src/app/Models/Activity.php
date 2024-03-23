<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'activities';
    public $timestamps = false;
    protected $fillable = [
        'detail',
        'date',
        'admin_id'
    ];

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    public static function saveActivity(int $id, string $detail)
    {
        Activity::create([
            'detail' => 'Admin ' . $id . ' ' . $detail,
            'date' => date('Y-m-d H:i:s'),
            'admin_id' => $id,
        ]);
    }
}
