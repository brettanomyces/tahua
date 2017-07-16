<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsbVisaRecord extends Model
{
    /*
    Created date / time : 21 April 2017 / 11:05:12
    Card Number 4564-9202-0519-5877 (Visa Gold)
    From date 20160401
    To date 20170401
    Date Processed,Date of Transaction,Unique Id,Tran Type,Reference,Description,Amount
     */

    const ASB_VISA_HEADERS = 'Date Processed,Date of Transaction,Unique Id,Tran Type,Reference,Description,Amount';

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

    public function transaction()
    {
        return $this->morphMany(Transaction::class, 'record');
    }
}
