<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BlogCategory
 * @package App\Models
 *
 * $property-read BlogCategory $parentCategory
 * @parenty-read string $parentTitle
 */
class BlogCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable
        = [
            'title',
            'slug',
            'parent_id',
            'description'
        ];

//обратная привязка
    public function parentCategory()
    {
        return $this->belongsTo(BlogNews::class);
    }

    public function getTitleAttribute($valueFromObject){
        return mb_strtoupper($valueFromObject);
    }
    public function setCountLikeAttribute($incomingValue){
        //вызывается при установки новых данных в обьект
        $this->attributes['count_like'] = int($incomingValue);
    }
    public function getParentTitleAttribute($value)
    {
        //вызывается при выводе инфы из базы
        //аксесуар - нужны для удаления логики из вьюхи
        //в вьюшке я вызвал parent_title как атрибут )
        $title = $this->parentCategory->title
            ?? ($this->isRoot()
                ? 'Корень'
                : '???'
            );
        return $title;
    }
    //создание мутатора происходит таким же образом только через сет
//    public function setParentTitleAttribute($value)
//    {
//        $this->attributes['first_name'] = strtolower($value);
//    }
    //является ли текущий обьект, категория  - корневым
    public function isRoot()
    {
        return $this->id === BlogCategory::ROOT;
    }
}
