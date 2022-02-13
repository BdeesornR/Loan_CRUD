<?php

namespace App\Services;

use App\Models\Loan;
use Carbon\Carbon;

class LoanService 
{
    public function repaymentCalculator(Loan $loan): array
    {
        $fullYear = config('loan.month.full_year');

        $loanAmount = $loan->loan_amount;
        $interestRate = ($loan->interest_rate / 100) / $fullYear;
        $loanTerm = $loan->loan_term;
        $repaymentAmount = ($loanAmount * $interestRate) / (1 - ((1 + $interestRate) ** (-($fullYear) * $loanTerm)));

        $repaymentDate = Carbon::createFromFormat(config('loan.date_format.default'), $loan->start_date);
        $repaymentPayload = [];
        $balance = $loanAmount;

        for ($i = 0; $i < $loanTerm * $fullYear; $i++) {
            $interest = $interestRate * $balance;
            $principal = $repaymentAmount - $interest;
            $balance = $balance - $principal;

            $month = $repaymentDate->addMonth()->monthName;
            $year = $repaymentDate->year;

            $repaymentData = [
                'seq' => $i + 1,
                'repayment_date' => $month." ".$year,
                'repayment_amount' => number_format($repaymentAmount, 2),
                'interest' => number_format($interest, 2),
                'principal' => number_format($principal, 2),
                'balance' => number_format(abs($balance), 2),
            ];

            array_push($repaymentPayload, $repaymentData);
        }

        return $repaymentPayload;
    }
}
