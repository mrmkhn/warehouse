<?php

namespace Modules\Profit\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Modules\Article\Http\Controllers\ArticleController;
use Modules\Product\Http\Controllers\ProductController;
use Modules\Product\Repositories\ProductRepository;

class ProfitController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        app('Modules\Article\Http\Controllers\ArticleController')->insert_json_file();
        app('Modules\Product\Http\Controllers\ProductController')->insert_json_file();
        $all_products = app('Modules\Product\Http\Controllers\ProductController')->get_all();
        $product_quantity_collection = $this->get_product_quantity($all_products);
        $products = $this->profit_sort($product_quantity_collection);
        return response()->json([
            'products' => $products,
            'status' => 200
        ], 200);
    }

    private function get_product_quantity($products)
    {
        $product_collection = collect([]);

        foreach ($products as $product) {
            $articles = $this->productRepository->get_articles($product);
            $quantity=$this->get_quantity($articles);


            $product_collection->push(
               [
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'price' => $product->price,
                    'count' => $quantity,
                    'profit' => $quantity * $product->price
                ]
            );

        }
        return $product_collection;
    }

    private function profit_sort($product_collection)
    {
        $product_collection = $product_collection->sort(function ($first_item, $second_item) {
            return $second_item['profit'] > $first_item['profit'];
        });
        return $product_collection->values()->all();
    }

    private function get_quantity($articles)
    {
        $quantity_array = [];
        foreach ($articles as $article)
            array_push($quantity_array, floor($article->stock / $article->pivot->amount));
       return  min($quantity_array);
    }
}
