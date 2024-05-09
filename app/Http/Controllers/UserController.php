<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = User::get();//$this->productRepositoryInterface->index();

        return response()->json($data,200);//ResponseClass::sendResponse(ProductResource::collection($data), '', 200);
    }

    public function store(Request $request)
    {
       /* $request->validate([
              'name' => 'required',
      ]);*/
          $data = $request->all();
          $user = User::create($data);
          return response()->json($user,201);

    }
}
