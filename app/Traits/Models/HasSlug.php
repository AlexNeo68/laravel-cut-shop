<?php

namespace App\Traits\Models;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasSlug
{
    public static function bootHasSlug(): void
    {
        static::creating(function (Model $item){

            $slug = self::createSlug(Str::slug($item->{self::slug_from()}));

            $item->slug = $item->slug ?? $slug;
        });
    }

    public static function slug_from(): string
    {
        return 'title';
    }

    private static function createSlug($title)
    {
        if (static::whereSlug($slug = Str::slug($title))->exists()) {
            $max = static::whereTitle($title)->latest('id')->skip(1)->value('slug');

            if (is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function ($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }

            return "{$slug}-2";
        }

        return $slug;
    }
}
