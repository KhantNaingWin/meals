<?php

namespace App\Repositories\api;

use App\Interfaces\api\CategoryApiInterface;
use App\Models\Category;

class CategoryApiRepository implements CategoryApiInterface{

   public function all(){

    return Category::all();
   }
   public function getCategoryById($id){
    return Category::find($id);
   }
}

?>
