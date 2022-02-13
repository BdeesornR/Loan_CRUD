<?php

namespace App\Http\Controllers;

use App\Repos\LoanRepo;
use App\Services\LoanService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class LoanController extends Controller
{
    protected $loanRepo;
    protected $loanService;

    public function __construct(LoanRepo $loanRepo, LoanService $loanService)
    {
        $this->loanRepo = $loanRepo;
        $this->loanService = $loanService;
    }

    public function showMain(): View
    {
        $loans = $this->loanRepo->getAllOrderByIdWithPagination('desc', 2);

        return view('loans.main', ['loans' => $loans]);
    }

    public function showCreate(): View
    {
        return view('loans.create');
    }

    public function registerNewLoan(Request $request): RedirectResponse
    {
        $loan = $this->loanRepo->registerNewLoan($request->all());

        return redirect(route('show-details', $loan->id))->with('msg', 'The Loan has been created successfully.');
    }

    public function showLoanDetails(int $id): View
    {
        $loan = $this->loanRepo->getLoan($id);

        $repaymentTable = $this->loanService->repaymentCalculator($loan);

        return view('loans.details', ['loan' => $loan, 'repaymentTable' => $repaymentTable]);
    }

    public function showEdit(int $id): View
    {
        $loan = $this->loanRepo->getLoan($id);

        return view('loans.edit', ['loan' => $loan]);
    }

    public function updateLoan(Request $request, int $id): RedirectResponse
    {
        $this->loanRepo->updateLoan($request->all(), $id);

        return redirect(route('show-details', $id))->with('msg', "The Loan #{ $id } has been updated successfully.");
    }

    public function deleteLoan(int $id): Response
    {
        $this->loanRepo->deleteLoan($id);

        return response('OK');
    }
}
