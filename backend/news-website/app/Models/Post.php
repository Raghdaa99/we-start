<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'status', 'category_id', 'image', 'updated_at', 'created_at'];
    const STATUS_ACTIVE = 'active';
    const STATUS_DRAFT  = 'draft';

    protected $appends = [
        'image_url'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');

    }
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return asset('images_posts/blank.jpg');
        }
//        if (Str::startsWith($this->image, ['http://', 'https://'])) {
//            return $this->image;
//        }
        return asset('storage/'.$this->image);
    }
    public static function statusOptions()
    {
        return [
            'active' => 'Active',
            'draft' => 'Draft',
        ];
    }
}
