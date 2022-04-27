<?php

namespace App\Observers;

use App\Models\BlogCategory;
use App\Models\BlogNews;
use Carbon\Carbon;

class BlogNewsObserver
{

//то что происходит перед обновлением
    public function updating(BlogNews $blogNews){
        $this->setPublishedAt($blogNews);
        $this->setSlug($blogNews);
    }

    public function creating(BlogNews $blogNews){
        $this->setPublishedAt($blogNews);

        $this->setSlug($blogNews);

        $this->setHtml($blogNews);

        $this->setUser($blogNews);
        $blogNews->count_like = 0;
    }
    public function setUser(BlogNews $blogNews){
        $blogNews->user_id = auth()->id() ?? BlogNews::UNKNOWN_USER;
    }
    public function setHtml(BlogNews $blogNews){
        if($blogNews->isDirty('content_row')){
            $blogNews->content_html = $blogNews->content_row;
        }
    }
    /**
     * Handle the ModelsBlogPost "created" event.
     *
     * @param  BlogNews  $blogNews
     * @return void
     */
    protected function setPublishedAt(BlogNews $blogNews){
        if(empty($blogNews->published_at) && $blogNews->is_published ){
            $blogNews->published_at = Carbon::now();
        }
    }

    protected function setSlug(BlogNews $blogNews){
        if(empty($blogNews->slug)){
            $blogNews->slug = \Str::slug($blogNews->title);
        }
    }
}
