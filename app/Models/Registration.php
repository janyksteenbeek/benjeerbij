<?php

namespace App\Models;

use App\Traits\Uuidable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use Uuidable, HasFactory;

    protected $casts = [
        'is_attending' => 'boolean',
    ];

    protected $guarded = [];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
