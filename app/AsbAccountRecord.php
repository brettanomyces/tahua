<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsbAccountRecord extends Model
{
    /*
    Created date / time : 19 April 2017 / 10:34:02
    Bank 12; Branch 3049; Account 0108403-50 (Streamline)
    From date 20170101
    To date 20170419
    Avail Bal : 3055.09 as of 20170418
    Ledger Balance : 555.09 as of 20170419
    Date,Unique Id,Tran Type,Cheque Number,Payee,Memo,Amount
     */

    const ASB_ACCOUNT_HEADERS = 'Date,Unique Id,Tran Type,Cheque Number,Payee,Memo,Amount';

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

    public function transaction()
    {
        return $this->morphOne(Transaction::class, 'record');
    }
}
