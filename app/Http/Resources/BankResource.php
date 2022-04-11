<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BankResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'bank_name' => $this->bank_name,
            'interest_rate' => $this->interest_rate,
            'max_loan' => $this->max_loan,
            'min_down_payment' => $this->min_down_payment,
            'loan_term' => $this->loan_term,
        ];
        // return parent::toArray($request);
    }
}
