<?php


namespace App\Repositories\Transactions\Repos;

use App\Repositories\Transactions\Interfaces\TransactionsInterface;
use Illuminate\Http\JsonResponse;

class CsvSource implements TransactionsInterface
{
    function getData(): JsonResponse
    {

        $cols = ["id", "code", "amount", "user_id", "created_at", "updated_at"];
        $csv = file(base_path('transactions.csv'));
        $output = [];
        foreach ($csv as $line_index => $line) {

            if ($line_index > 0) {

                $newLine = [];

                $separatedCommaValues = explode(',', $line);

                foreach ($separatedCommaValues as $col_index => $value) {

                    $separatedQuotationMark = explode('"', $value);

                    if (count($separatedQuotationMark) == 1) {

                        $newLine[$cols[$col_index]] = $separatedQuotationMark[0];

                    } elseif (count($separatedQuotationMark) > 1) {

                        $newLine[$cols[$col_index]] = $separatedQuotationMark[1];
                    }

                }
                $output[] = $newLine;
            }
        }
        $jsonForResponse = [
            'error' => true,
            'message' => 'List of transactions',
            'data' => $output
        ];
        return response()->json($jsonForResponse, 200);
    }


}
