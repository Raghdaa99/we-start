<?php

namespace App\Models;

use App\Traits\Trans;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasFactory, Trans;

    protected $fillable = ['name', 'slug', 'parent_id'];
    protected $appends = ['trans_name', 'en_name', 'ar_name'];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id')->withDefault();
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

//    public function scopeParents($query)
//    {
//        return $query->whereNull('parent_id');
//    }

//    public function getSlugOptions(): SlugOptions
//    {
//        return SlugOptions::create()
//            ->generateSlugsFrom(request()->en_name)
//            ->saveSlugsTo('slug');
//    }

//    public function getImagePathAttribute()
//    {
//        return asset('storage/' . $this->image->path);
//    }

    protected static function booted()
    {
        parent::booted(); // TODO: Change the autogenerated stub

        static::creating(function ($value) {
            $slug = Str::slug(request()->en_name);
            $count = Category::where('slug', 'like', $slug . '%')->count();
            if ($count) {
                $slug = $slug . '-' . $count;
            }

            $value->slug = $slug;
        });
    }


}
