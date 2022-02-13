<?php

namespace App\Repos;

use App\Models\Loan;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;

class LoanRepo
{
    protected $loan;

    public function __construct(Loan $loan)
    {
        $this->loan = $loan;
    }

    public function getLoan(int $id)
    {
        return $this->loan->findOrFail($id);
    }

    public function getAllOrderByIdWithPagination($order = 'asc', $paginate = 6): LengthAwarePaginator
    {
        return $this->loan->orderBy('id', $order)->paginate($paginate);
    }

    public function registerNewLoan(array $loanData): Loan
    {
        var_dump($loanData);
        $startDate = $loanData['start_date'];

        $this->loan->loan_amount = $loanData['amount'];
        $this->loan->loan_term = $loanData['term'];
        $this->loan->start_date = Carbon::create($startDate['year'], $startDate['month'])->startOfMonth();
        $this->loan->interest_rate = $loanData['interest'];

        $this->loan->save();

        return $this->loan;
    }

    public function updateLoan(array $loanData, int $id): void
    {
        $startDate = $loanData['start_date'];

        $loan = $this->loan->where('id', $id);
        
        $loan->update([
            'loan_amount' => $loanData['amount'],
            'loan_term' => $loanData['term'],
            'start_date' => Carbon::create($startDate['year'], $startDate['month'])->startOfMonth(),
            'interest_rate' => $loanData['interest'],
        ]);
    }

    public function deleteLoan(int $id): void
    {
        $loan = $this->getLoan($id);
        $loan->delete();
    }
}
