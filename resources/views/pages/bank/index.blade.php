@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2>List of the banks</h2>
            </div>
            <div class="col-md-9 btn-action">
                <button type="button" class="btn btn-add" data-bs-toggle="modal" data-bs-target="#modalAdd"><i
                        class="bi bi-plus-square-fill"></i> Add Bank</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table">
                    <div class="table__header">
                        <div class="table__td">Bank name</div>
                        <div class="table__td">Interest rate</div>
                        <div class="table__td">Max loan</div>
                        <div class="table__td">Min down payment</div>
                        <div class="table__td">Loan term</div>
                        <div class="table__td">Action</div>
                    </div>
                    @if ($items->count() == 0)
                        <div class="table__tr empty">
                            <div class="table__td">Data not found!</div>
                        </div>
                    @else
                        <span id="banks-list"></span>
                        @foreach ($items as $item)
                            <div class="table__tr">
                                <div class="table__td">{{ $item->bank_name }}</div>
                                <div class="table__td">{{ $item->interest_rate }}%</div>
                                <div class="table__td">${{ $item->max_loan }}</div>
                                <div class="table__td">{{ $item->min_down_payment }}%</div>
                                <div class="table__td">{{ $item->loan_term }} months</div>
                                <div class="table__td actions">
                                    <a href="{{ route('banks.edit', $item->id) }}"><i class="bi bi-pencil-fill"></i></a>
                                    <i class="delete-form bi bi-trash-fill" data-id={{ $item->id }}></i>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
