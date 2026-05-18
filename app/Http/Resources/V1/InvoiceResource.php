<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class InvoiceResource extends JsonResource
{
    private array $types = [
        'C' => 'Cartão',
        'c' => 'Cartão',
        'B' => 'Boleto',
        'b' => 'Boleto',
        'P' => 'Pix',
        'p' => 'Pix'
    ];
    public function toArray(Request $request): array
    {
        $paid = $this->paid;
        return [
            'user' => [
                'fullName' =>$this->user->firstName . ' ' . $this->user->lastName,
                'email' =>$this->user->email,
            ],
            'type' => $this->types[$this->type],
            'value' => 'R$ '.number_format($this->value, 2 , ',' , '.'),
            'paid' => $paid ? 'Pago' : 'Devendo',
            'PaymentDate' => $paid ? Carbon::parse($this->payment_date)->format('d/m/y h:i:s') : null,
            'PaymentSince' => $paid ? Carbon::parse($this->payment_date)->diffForHumans() : null
        ];
    }
}
