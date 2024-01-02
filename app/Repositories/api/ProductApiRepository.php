<?php

namespace App\Repositories\api;

use App\Interfaces\api\ProductApiInterface;
use App\Models\Product;

class ProductApiRepository implements ProductApiInterface{

   public function all(){

    return Product::all();
   }
   public function getProductId($id){
    return Product::find($id);
   }
}

?>
