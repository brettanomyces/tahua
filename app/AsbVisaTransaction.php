<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsbVisaTransaction extends Model implements Transaction
{
    /**
     * @var array
     */
    protected $fillable = [
        'date_processed',
        'date_of_transaction',
        'unique_id',
        'tran_type',
        'reference',
        'description',
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
