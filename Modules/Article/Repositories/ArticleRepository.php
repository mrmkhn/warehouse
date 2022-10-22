<?php


namespace Modules\Article\Repositories;

use Modules\Article\Models\Article;

class ArticleRepository
{

    public function create($article)
    {
        return Article::create([
            'name'=>$article['name'],
            'stock'=>$article['stock'],
        ]);
    }
}
