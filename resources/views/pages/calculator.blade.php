@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="mb-3">
                    <label for="bank_name" class="form-label">Bank name</label>
                    <select id="select-bank" name="select-bank">
                        <option value="empty">Select a bank...</option>
                        @foreach ($items as $bank)
                            <option value="{{ $bank->id }}">{{ $bank->bank_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-md-10">
                            <label for="initial_loan" class="form-label">Initial Loan</label>
                        </div>
                        <div class="col-md-2">
                            <input type="number" class="form-control" id="initial_loan_input" name="initial_loan_input"
                                required>
                        </div>
                    </div>
                    <input type="number" class="form-control" id="initial_loan" name="initial_loan" required>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col-md-10">
                            <label for="down_payment" class="form-label">Down payment</label>
                        </div>
                        <div class="col-md-2">
                            <input type="number" class="form-control" id="down_payment_input" name="down_payment_input"
                                required>
                        </div>
                    </div>
                    <input type="number" class="form-control" id="down_payment" name="down_payment" required>
                </div>

                <button type="button" class="btn btn-primary btn-get-result" disabled>Result</button>



            </div>
        </div>
    </div>
@endsection
