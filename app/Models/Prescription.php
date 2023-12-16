<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    const STATUS_PENDING = 1;
    const STATUS_QUOTED = 2;
    const STATUS_REJECTED = 3;
    const STATUS_APPROVED = 4;

    public function getStringStatusAttribute()
    {
        switch ($this->status) {
            case self::STATUS_PENDING:
                return 'pending';
            case self::STATUS_QUOTED:
                return 'quoted';
            case self::STATUS_REJECTED:
                return 'rejected';
            case self::STATUS_APPROVED:
                return 'approved';
            default:
                return 'unknown'; // Or handle other cases as needed
        }
    }

    protected $fillable = [
        'user_id',
        'note',
        'delivery_address',
        'time_slot',
        'images',
        'status'
    ];

    protected $casts = [
        'images' => 'array'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
