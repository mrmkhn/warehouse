<?php


namespace Modules\Product\Repositories;

use Modules\Product\Models\Product;

class ProductRepository
{


    public function create($product)
    {
        return Product::create([
            'name'=>$product['name'],
            'price'=>$product['price'],
        ]);
    }

    public function attach_article($product, $article)
    {
        return $product->articles()->attach($article['id'],['amount'=>$article['amount']]);
    }

    public function all()
    {
        return Product::all();
    }

    public function get_articles($product)
    {
        return $product->articles->sortby('stock');
    }


}
