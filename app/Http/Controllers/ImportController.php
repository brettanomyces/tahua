<?php

namespace App\Http\Controllers;

use App\AsbAccountTransaction;
use App\AsbVisaTransaction;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ImportController extends Controller
{

    const ASB_VISA_HEADERS = 'Date Processed,Date of Transaction,Unique Id,Tran Type,Reference,Description,Amount';
    const ASB_ACCOUNT_HEADERS = 'Date,Unique Id,Tran Type,Cheque Number,Payee,Memo,Amount';

    public function import(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload')->openFile();
            $file->setFlags(\SplFileObject::DROP_NEW_LINE | \SplFileObject::SKIP_EMPTY);

            while ($line = $file->fgets()) {
                if (0 === strcmp(ImportController::ASB_ACCOUNT_HEADERS, $line)) {
                    return $this->parseAsbAccountCsv($file);
                } elseif (0 === strcmp(ImportController::ASB_VISA_HEADERS, $line)) {
                    return $this->parseAsbVisaCsv($file);
                }
            }
        }
    }

    /* ASB Visa
    Created date / time : 21 April 2017 / 11:05:12
    Card Number 4564-9202-0519-5877 (Visa Gold)
    From date 20160401
    To date 20170401
    Date Processed,Date of Transaction,Unique Id,Tran Type,Reference,Description,Amount
     */

    /* ASB Account
    Created date / time : 19 April 2017 / 10:34:02
    Bank 12; Branch 3049; Account 0108403-50 (Streamline)
    From date 20170101
    To date 20170419
    Avail Bal : 3055.09 as of 20170418
    Ledger Balance : 555.09 as of 20170419
    Date,Unique Id,Tran Type,Cheque Number,Payee,Memo,Amount
     */

    private function parseAsbVisaCsv(\SplFileObject $file)
    {
        while ($line = $file->fgetcsv()) {
            try {
                $transaction = AsbVisaTransaction::create([
                    'date_processed' => $line[0],
                    'date_of_transaction' => $line[1],
                    'unique_id' => $line[2],
                    'tran_type' => $line[3],
                    'reference' => $line[4],
                    'description' => $line[5],
                    'amount' => $line[6],
                ]);
            } catch (QueryException $e) {
                return $e;
            }
        }
        return AsbVisaTransaction::all();
    }

    private function parseAsbAccountCsv(\SplFileObject $file)
    {
        while ($line = $file->fgetcsv()) {
            try {
                $transaction = AsbAccountTransaction::create([
                    'date' => $line[0],
                    'unique_id' => $line[1],
                    'tran_type' => $line[2],
                    'cheque_number' => $line[3],
                    'payee' => $line[4],
                    'memo' => $line[5],
                    'amount' => $line[6],
                ]);
            } catch (QueryException $e) {
                return $e;
            }
        }
        return AsbAccountTransaction::all();
    }
}

