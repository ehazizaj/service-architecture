<?php

namespace App\Http\Controllers;

use App\ServiceManager\TransactionsTypes;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * @var $transactionType
     */
    private $transactionType ;

    /**
     * eBayRepositoryInterface constructor.
     * @param TransactionsTypes $type
     */
    public function __construct(TransactionsTypes $type)
    {
        $this->transactionType = $type;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $source = $request->input('source');
        if ($source) {
            return $this->transactionType->get($source)->getData();
        } else {
            $response = [
                'error' => true,
                'message' => "We can not serve what you are asking for",
            ];
            return response()->json($response, 400);
        }

    }
}
