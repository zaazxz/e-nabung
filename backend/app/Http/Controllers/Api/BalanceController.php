<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Balance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class BalanceController extends Controller
{

    public function index()
    {

        $balances = Balance::orderBy('id', 'desc')->get()->map(function ($balance) {
            return [
                'id' => $balance->id,
                'user_id' => User::where('id', $balance->user_id)->first(['name', 'email', 'balance']),
                'added_balance' => $balance->added_balance,
                'reduced_balance' => $balance->reduced_balance,
                'date' => $balance->date
            ];
        });

        if ($balances->isEmpty()) {
            return response()->json([
                'code' => 404,
                'message' => 'Balances Data Not Found',
                'data' => null
            ]);
        }

        $user = request('user') ? Balance::where('user_id', request('user'))->orderBy('id', 'desc')->get()->map(function ($balance) {
            return [
                'id' => $balance->id,
                'user_id' => User::where('id', $balance->user_id)->first(['name', 'email', 'balance']),
                'added_balance' => $balance->added_balance,
                'reduced_balance' => $balance->reduced_balance,
                'date' => $balance->date
            ];
        }) : $balances;

        if($user->isEmpty()) {
            return response()->json([
                'code' => 404,
                'message' => 'Balances Data Not Found',
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
            'user_id' => 'required|exists:users,id',
            'added_balance' => 'required',
            'reduced_balance' => 'required',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'code' => 400,
                'message' => $validation->errors(),
                'data' => null
            ]);
        }

        $balance = Balance::create([
            'user_id' => $request->user_id,
            'added_balance' => $request->added_balance,
            'reduced_balance' => $request->reduced_balance,
            'date' => Carbon::now(),
        ]);

        $userBalanceUpdated = User::where('id', $balance->user_id)->first();
        $userBalanceUpdated->balance += $request->added_balance;
        $userBalanceUpdated->balance -= $request->reduced_balance;
        $userBalanceUpdated->save();

        $newBalance = Balance::where('id', $balance->id)->get()->map(function ($balance) {
            return [
                'id' => $balance->id,
                'user_id' => User::where('id', $balance->user_id)->first(['name', 'email', 'balance']),
                'added_balance' => $balance->added_balance,
                'reduced_balance' => $balance->reduced_balance,
                'date' => $balance->date
            ];
        });

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => $newBalance
        ]);

    }

    public function update(Request $request, $id)
    {
        $balance = Balance::find($id);
        $datetime = Carbon::now();
        $userBalanced = User::where('id', $balance->user_id)->first();

        if (!$balance) {
            return response()->json([
                'code' => 404,
                'message' => 'Balance Data Not Found',
                'data' => null
            ]);
        }

        if ($datetime->diffInMinutes($balance->date) > 5) {
            return response()->json([
                'code' => 404,
                'message' => 'Balance Data expired update times',
                'data' => null
            ]);
        }

        $userBalanced->update([
            'balance' => $userBalanced->balance - $balance->added_balance + $balance->reduced_balance
        ]);

        $balance->update([
            'added_balance' => $request->added_balance,
            'reduced_balance' => $request->reduced_balance
        ]);

        $userBalanced->update([
            'balance' => $userBalanced->balance + $balance->added_balance - $balance->reduced_balance
        ]);

        $newBalance = Balance::where('id', $balance->id)->get()->map(function ($balance) {
            return [
                'id' => $balance->id,
                'user_id' => User::where('id', $balance->user_id)->first(['name', 'email', 'balance']),
                'added_balance' => $balance->added_balance,
                'reduced_balance' => $balance->reduced_balance,
                'date' => $balance->date
            ];
        });

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => $newBalance
        ]);

    }

    public function destroy($id)
    {
        $balance = Balance::find($id);
        $datetime = Carbon::now();
        $userBalanced = User::where('id', $balance->user_id)->first();

        if (!$balance) {
            return response()->json([
                'code' => 404,
                'message' => 'Balance Data Not Found',
                'data' => null
            ]);
        }

        if ($datetime->diffInMinutes($balance->date) > 5) {
            return response()->json([
                'code' => 404,
                'message' => 'Balance Data expired delete times',
                'data' => null
            ]);
        }

        $userBalanced->update([
            'balance' => $userBalanced->balance - $balance->added_balance + $balance->reduced_balance
        ]);

        $balance->delete();

        return response()->json([
            'code' => 200,
            'message' => 'Success'
        ]);

    }
}
