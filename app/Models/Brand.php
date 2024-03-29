<?php

namespace App\Models;

use App\Traits\Models\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Brand extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = [
        'title', 'slug', 'thumbnail'
    ];

    public function Products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
