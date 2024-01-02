<?php

namespace App\Http\Controllers\api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Interfaces\api\ProductApiInterface;

class ProductApiController extends Controller
{
    private $productApi;
    public function __construct(ProductApiInterface $productApiInterface)
    {
        $this->productApi= $productApiInterface;
    }
    public function all(){
        $products=$this->productApi->all();
        return ProductResource::collection($products);

    }
    public function getProductId($id){
        $product=$this->productApi->getProductId($id);
        return new ProductResource($product);

    }
}
