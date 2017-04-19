<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsbVisaTransaction extends Model
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
}
