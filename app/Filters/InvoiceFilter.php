<?php
namespace App\Filters;

use DeepCopy\Exception\PropertyException;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\PropertyProperty;

class InvoiceFilter extends Filter
{

    protected array $allowedOperetorsFields = [
            'value' => ['gt', 'eq' , 'lt' , 'gte' , 'lte' , 'ne'],
            'type' => ['eq' , 'ne' , 'in'],
            'paid' => ['eq' , 'ne'],
            'payment_date' => ['gt', 'eq' , 'lt' , 'gte' , 'lte' , 'ne'],
        
    ];

    



    
}

