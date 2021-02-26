<?php


namespace App\ServiceManager;


use App\Repositories\Transactions\Interfaces\TransactionsInterface;
use HttpException;
use Illuminate\Http\JsonResponse;
class TransactionsTypes
{
    protected $types = [];

    function register ($name, TransactionsInterface $instance): TransactionsTypes
    {
        $this->types[$name] = $instance;
        return $this;
    }

    function get($name)
    {
        if (array_key_exists ($name, $this->types)) {
            return $this->types[$name];
        } else {
          abort(400,'This source is not valid');
        }
    }
}
