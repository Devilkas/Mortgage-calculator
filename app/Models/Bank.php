<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $fillable = ['bank_name', 'loan_term', 'interest_rate', 'max_loan', 'min_down_payment'];

    public static function add($fields)
    {
        $news = new static;
        $news->fill($fields);
        $news->save();

        return $news;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
        $this->delete();
    }
}
