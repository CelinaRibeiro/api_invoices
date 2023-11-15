<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::simplePaginate();

        return UserResource::collection($users);

    }


    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        return new UserResource(User::findOrFail($id));
    }



    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
