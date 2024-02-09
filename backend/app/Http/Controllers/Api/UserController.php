<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        $limit = request('limit') ? $users->take(request('limit')) : $users;

        if ($users->isEmpty()) {
            return response()->json([
                'code' => 404,
                'message' => 'Data Not Found',
                'data' => null
            ]);
        }

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => $limit
        ]);

    }


    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'code' => 404,
                'message' => 'User Not Found',
                'data' => null
            ]);
        }

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => $user
        ]);

    }

    public function store(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        if ($validation->fails()) {
            return response()->json([
                'code' => 400,
                'message' => $validation->errors(),
                'data' => null
            ]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'balance' => 0,
            'password' => bcrypt($request->password),
            'created_at' => Carbon::now(),
        ]);

        if ($user) {
            return response()->json([
                'code' => 200,
                'message' => 'Success',
                'data' => $user
            ]);
        }

        return response()->json([
            'code' => 400,
            'message' => 'Failed',
            'data' => null
        ]);

    }

    public function update(Request $request, $id)
    {

        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'code' => 400,
                'message' => 'User Not Found',
                'data' => null
            ]);
        }

        $validation = Validator::make($request->all(), [
            'name' => 'string|max:255|min:3',
            'email' => 'email',
            'balance' => 'nullable'
        ]);

        if ($validation->fails()) {
            return response()->json([
                'code' => 400,
                'message' => $validation->errors(),
                'data' => null
            ]);
        }

        if ($request->has('balance')) {
            return response()->json([
                'code' => 400,
                'message' => 'Balance field cannot Be Updated',
                'data' => null
            ]);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        $updatedUser = User::where('id', $id)->first();

        if ($updatedUser) {
            return response()->json([
                'code' => 200,
                'message' => 'Success',
                'data' => $updatedUser
            ]);
        }

        return response()->json([
            'code' => 400,
            'message' => 'Failed',
            'data' => null
        ]);

    }
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'code' => 400,
                'message' => 'User Not Found',
            ]);
        }

        $userDeleted = User::where('id', $user->id)->delete();

        if ($userDeleted) {
            return response()->json([
                'code' => 200,
                'message' => 'Success'
            ]);
        }

    }
}
