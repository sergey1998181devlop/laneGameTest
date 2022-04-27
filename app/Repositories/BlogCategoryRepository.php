<?php
namespace App\Repositories;
use App\Models\BlogCategory;
use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;

class BlogCategoryRepository {




    /**
     * Получить список категорий для вывода в выпадающем списке
     * @return Collection
     */
    public function getForComboBox(){
        $columns = implode(', ', [
           'id',
           'CONCAT (id, ". ", title) AS id_title'
        ]);
        $result = BlogCategory::
             selectRaw($columns)
            ->toBase()//не нужно оборачивать в объекты блок категории  - получаем только данные
            ->get();

        return $result;
    }

}
