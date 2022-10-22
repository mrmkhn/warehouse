<?php

namespace Modules\Article\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Article\Repositories\ArticleRepository;

class ArticleController extends Controller
{
    private $articleRepository;

    public function __construct(ArticleRepository  $articleRepository)
    {
        $this->articleRepository = $articleRepository;

    }
    public  function  insert_json_file():bool
    {
        $json = file_get_contents(storage_path('app\public\articles.json'));
        $articles_array = json_decode($json,true);
        foreach ($articles_array['articles'] as $article)
            $this->articleRepository->create($article);

       return true;
    }
}
