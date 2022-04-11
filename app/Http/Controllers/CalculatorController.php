<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;


class CalculatorController extends Controller
{
    public function index()
    {
        $items = Bank::latest()->get();
        return view('pages.calculator', compact('items'));
    }
}
