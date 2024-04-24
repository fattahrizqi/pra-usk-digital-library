<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function admin():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function book():BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
    
    public function bookdetail():BelongsTo
    {
        return $this->belongsTo(BookDetail::class);
    }
}
