<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Category extends Model
{
    // use HasUlids;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'parent_id',
    ];

    // Get the parent category of a sub categories
    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    // Get the children category of a  categories
    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    // Get all ads for the category
    public function categoryAds(): HasMany
    {
        return $this->hasMany(Ad::class, 'category_id');
    }
}
