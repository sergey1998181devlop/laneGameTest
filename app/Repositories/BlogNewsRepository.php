<?php
namespace App\Repositories;
use App\Models\BlogNews;
use Illuminate\Database\Eloquent\Collection;

class BlogNewsRepository{


    public function getAllWithPaginate(){
        $columns = [
            'id',
            'count_like',
            'title',
            'slug',
            'is_published',
            'user_id',
            'published_at'
        ];
        $result = BlogNews::
                    with([
                        'category:id,title',
                        'user:id,name'
                    ])
                    ->select($columns)
                    ->paginate(10);
        return $result;
    }

}
