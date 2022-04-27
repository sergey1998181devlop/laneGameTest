<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogNews extends Model
{
    use HasFactory;
    use SoftDeletes;//все у которых deleted_at не заполенные ) удаленные не берем

    protected $fillable
    = [
        'title',
        'slug',
        'content_row',
        'is_published',
        'published_at',
        'count_like'
      ];

    public function category()
    {
        //новость принадлежит категории
        return $this->belongsToMany(BlogCategory::class);
    }

    public function user()
    {
        //новость пренадлежит пользователю
        return $this->belongsTo(User::class);
    }
}
