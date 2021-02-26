<?php


namespace App\Repositories\Transactions\Repos;
use Illuminate\Http\JsonResponse;

use App\Models\Transaction;
use App\Repositories\Transactions\Interfaces\TransactionsInterface;

class DbSource implements TransactionsInterface
{
    function getData (): JsonResponse
    {
      $transactions = Transaction::all();

        $jsonForResponse = [
            'error' => true,
            'message' => 'List of transactions',
            'data' => $transactions
        ];
        return response()->json($jsonForResponse, 200);
    }
}
