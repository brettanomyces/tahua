<?php

namespace App\Http\Controllers;

use App\AsbAccountRecord;
use App\AsbVisaRecord;
use App\Transaction;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function import(Request $request)
    {
        $this->validate($request, [
            'upload' => 'required'
        ]);

        $file = $request->file('upload')->openFile();
        $file->setFlags(\SplFileObject::DROP_NEW_LINE | \SplFileObject::SKIP_EMPTY);

        while ($line = $file->fgets()) {
            if (0 === strcmp(AsbAccountRecord::ASB_ACCOUNT_HEADERS, $line)) {
                return $this->parseAsbAccountCsv($file);
            } elseif (0 === strcmp(AsbVisaRecord::ASB_VISA_HEADERS, $line)) {
                return $this->parseAsbVisaCsv($file);
            }
        }
    }

    private function parseAsbVisaCsv(\SplFileObject $file)
    {
        while ($line = $file->fgetcsv()) {
            if (! AsbVisaRecord::where('unique_id', $line[1])->exists()) {
                $record = AsbVisaRecord::create([
                    'date_processed' => $line[0],
                    'date_of_transaction' => $line[1],
                    'unique_id' => $line[2],
                    'tran_type' => $line[3],
                    'reference' => $line[4],
                    'description' => $line[5],
                    'amount' => $line[6],
                ]);

                $transaction = Transaction::create([
                    'date' => $record['date'],
                    'amount' => $record['amount'],
                    'description' => $record['description'],
                ]);

                $transaction->record()->associate($record);
                $transaction->save();
            }
        }
        return response()->json(Transaction::all());
    }

    private function parseAsbAccountCsv(\SplFileObject $file)
    {
        while ($line = $file->fgetcsv()) {
            if (! AsbAccountRecord::where('unique_id', $line[1])->exists()) {
                $record = AsbAccountRecord::create([
                    'date' => $line[0],
                    'unique_id' => $line[1],
                    'tran_type' => $line[2],
                    'cheque_number' => $line[3],
                    'payee' => $line[4],
                    'memo' => $line[5],
                    'amount' => $line[6],
                ]);

                $transaction = Transaction::create([
                    'date' => $record['date'],
                    'amount' => $record['amount'],
                    'description' => $record['payee'] . '/' . $record['memo'],
                ]);

                $transaction->record()->associate($record);
                $transaction->save();
            }
        }
        return response()->json(Transaction::all());
    }
}

