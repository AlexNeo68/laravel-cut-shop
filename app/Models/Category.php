<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

use \App\Traits\Models\HasSlug;

class Category extends Model
{
    use HasFactory;
    use HasSlug;
    protected $fillable = ['title'];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
