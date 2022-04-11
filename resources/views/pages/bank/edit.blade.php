@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h3>Edit <strong>{{ $item->bank_name }}</strong></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form id="edit-form" class="form">
                    {{-- <form action="{{ route('banks.update', $item->id) }}" method="post" enctype="multipart/form-data"
                    class="form"> --}}
                    @csrf
                    @method("PUT")
                    <div class="mb-3">
                        <label for="bank_name" class="form-label">Bank name</label>
                        <input type="text" class="form-control" id="bank_name" name="bank_name"
                            value="{{ $item->bank_name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="max_loan" class="form-label">Max loan</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="max_loan" name="max_loan"
                                value="{{ $item->max_loan }}" required>
                            <span class="input-group-text">$</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="loan_term" class="form-label">Loan term</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="loan_term" name="loan_term"
                                value="{{ $item->loan_term }}" required>
                            <span class="input-group-text">months</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="interest_rate" class="form-label">Interest rate</label>
                        <input type="number" class="form-control" id="interest_rate" name="interest_rate"
                            value="{{ $item->interest_rate }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="min_down_payment" class="form-label">Min down payment</label>
                        <input type="number" class="form-control" id="min_down_payment" name="min_down_payment"
                            value="{{ $item->min_down_payment }}" required>
                    </div>
                    {{-- <button type="submit" class="btn btn-warning">Edit</button> --}}
                    <button type="button" class="btn btn-warning edit-from-btn" data-id="{{ $item->id }}">Edit </button>
                </form>
            </div>
        </div>
    </div>
@endsection
