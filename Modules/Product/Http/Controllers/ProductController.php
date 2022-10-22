<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Product\Repositories\ProductRepository;

class ProductController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepository   $productRepository)
    {
        $this->productRepository = $productRepository;

    }

    public  function  insert_json_file():bool
    {
        $json = file_get_contents(storage_path('app\public\products.json'));
        $object = json_decode($json,true);
        foreach ($object['products'] as $product)
        {
            $db_product=$this->productRepository->create($product);
//            dd($product['articles']);
            $this->attach_articles($db_product,$product['articles']);

        }

        return true;
    }

    private function attach_articles($product,$articles):bool
    {
        foreach ($articles as $article)
            $this->productRepository->attach_article($product,$article);
        return true;
    }

}
