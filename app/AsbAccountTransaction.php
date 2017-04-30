<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsbAccountTransaction extends Model implements Transaction
{
    /**
     * @var array
     */
    protected $fillable = [
        'date',
        'unique_id',
        'tran_type',
        'cheque_number',
        'payee',
        'memo',
        'amount'
    ];

    public function date()
    {
        return $this['date'];
    }

    public function amount()
    {
        return $this['amount'];
    }

    public function description()
    {
        return $this['memo'];
    }

    public function id()
    {
        return $this['unique_id'];
    }
}
