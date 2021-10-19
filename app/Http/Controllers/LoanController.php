<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loans;
use Carbon\Carbon;

class LoanController extends Controller
{
    public function index() {
        $loans = Loans::orderBy('id', 'desc')->paginate(2);

        // terminate the program and output parameter.
        // dd($loans->created_at);

        return view('loans.index', ['loans' => $loans]);
    }

    public function create() {
        return view('loans.create');
    }

    public function store() {
        $loans = new Loans();

        $loans->loan_amount = request('amount');
        $loans->loan_term = request('term');
        $start_date = Carbon::create(request('start_date')["year"],request('start_date')["month"],1);
        $loans->start_date = $start_date;
        $loans->interest_rate = request('interest');

        $loans->save();

        $loan = Loans::latest('created_at')->first();

        return redirect("/details/$loan->id")->with('msg', 'The Loan has been created successfully.');
    }

    public function show($id) {
        // maybe link to other table?
        $loan = Loans::findOrFail($id);
        return view('loans.details', ['loan' => $loan]);
    }

    public function edit($id) {
        $loan = Loans::findOrFail($id);
        return view('loans.edit', ['loan' => $loan]);
    }

    public function modify($id) {
        $start_date = Carbon::create(request('start_date')["year"],request('start_date')["month"],1);

        Loans::where('id', $id)->update([
            'loan_amount' => request('amount'),
            'loan_term' => request('term'),
            'start_date' => $start_date,
            'interest_rate' => request('interest')
        ]);

        return redirect("/details/$id")->with('msg', 'The Loan has been updated successfully.');
    }

    public function destroy($id) {
        $loan = Loans::findOrFail($id);
        $loan->delete();

        return redirect('/main')->with('msg', "The Loan #{$id} been deleted successfully.");
    }
}
