<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ad extends Model
{
    // use HasUlids;
    protected $fillable = [
        'title',
        'ads_price',
        'ads_image',
        'location',
        'ads_description',
        'category_id',
        'user_id',
    ];

    // Get User Who create the Ad
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Get Category of the Ad
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
