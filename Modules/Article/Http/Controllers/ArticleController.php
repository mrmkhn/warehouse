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

}
