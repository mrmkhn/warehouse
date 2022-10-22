<?php

namespace Modules\Product\Traits;

use Modules\Article\Models\Article;

trait ProductRelations
{

    public function articles()
    {
        return $this->belongsToMany(Article::class,'article_product','product_id','article_id')->withPivot('amount');

    }
}
