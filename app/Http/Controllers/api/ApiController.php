<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Interfaces\api\CategoryApiInterface;
use App\Repositories\api\CategoryApiRepository;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    private $categoryapi;

    public function __construct(CategoryApiInterface $CategoryInterface)
    {
        $this->categoryapi = $CategoryInterface;
    }

    public function all(){

        $category=$this->categoryapi->all();
        // dd($category);
        // return new CategoryResource($category);
        return CategoryResource::collection($category);

    }
    public function getCategoryById($id){
        $category=$this->categoryapi->getCategoryById($id);
        // dd($category);
        // return new CategoryResource($category);
        return new CategoryResource($category);

    }
}
