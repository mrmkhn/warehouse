<?php

namespace Modules\Profit\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Article\Http\Controllers\ArticleController;
use Modules\Article\Repositories\ArticleRepository;
use Modules\Product\Http\Controllers\ProductController;
use Modules\Product\Repositories\ProductRepository;

class ProfitController extends Controller
{
    private $articleRepository;
    private $productRepository;
    public function __construct(ArticleRepository  $articleRepository,ProductRepository $productRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->productRepository = $productRepository;

    }
    public function  index()
    {

    }
}
