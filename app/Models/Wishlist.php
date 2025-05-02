<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model 
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'product_type', 'is_wantlist'];

    protected $casts = [
        'is_wantlist' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->morphTo();
    }
}
