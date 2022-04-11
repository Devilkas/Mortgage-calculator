<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Bank::latest()->get();
        return view('pages.bank.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'bank_name' => 'required',
                'interest_rate' => 'required',
                'max_loan' => 'required',
                'min_down_payment' => 'required',
                'loan_term' => 'required',
            ],
            [
                'bank_name.required' => 'Заповніть поле "Bank name"',
                'interest_rate.required' => 'Заповніть поле "Interest rate"',
                'max_loan.required' => 'Заповніть поле "Max loan"',
                'min_down_payment.required' => 'Заповніть поле "Min down payment"',
                'loan_term.required' => 'Заповніть поле "Loan term"',
            ]
        );

        Bank::add($request->all());
        return redirect()->route('banks.index')->with('success', 'Банк додана!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Bank::find($id);
        return view('pages.bank.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'bank_name' => 'required',
                'interest_rate' => 'required',
                'max_loan' => 'required',
                'min_down_payment' => 'required',
                'loan_term' => 'required',
            ],
            [
                'bank_name.required' => 'Заповніть поле "Bank name"',
                'interest_rate.required' => 'Заповніть поле "Interest rate"',
                'max_loan.required' => 'Заповніть поле "Max loan"',
                'min_down_payment.required' => 'Заповніть поле "Min down payment"',
                'loan_term.required' => 'Заповніть поле "Loan term"',
            ]
        );

        $item = Bank::find($id);
        $item->edit($request->all());
        return redirect()->route('banks.index')->with('success', 'Банк успішно змінена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bank::find($id)->remove();
        return redirect()->route('banks.index')->with('info', 'Банк видалена!');
    }
}
