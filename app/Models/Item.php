<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'code',
        'location',
        'status',
        'image_path',
        'deposited_at',
        'points',
        'claimed_at',
        'is_visible',
        'reported_by',
        'deposited_by',
        'claimed_by',
    ];

    // Relationships
    public function reporter()
    {
        return $this->belongsTo(User::class, 'reported_by');
    }

    public function depositor()
    {
        return $this->belongsTo(User::class, 'deposited_by');
    }

    public function claimer()
    {
        return $this->belongsTo(User::class, 'claimed_by');
    }

}
