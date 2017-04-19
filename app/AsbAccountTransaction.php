<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsbAccountTransaction extends Model
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
}
