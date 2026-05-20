<?php

namespace App\Models;

use App\Filters\InvoiceFilter;
use App\Http\Resources\V1\InvoiceResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;

class Invoice extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'user_id',
        'type',
        'paid',
        'payment_date',
        'value'
    ];

    protected function casts(): array
    {
        return [
            // exemplo:
            // 'paid_at' => 'datetime',
            // 'total' => 'decimal:2',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function filter(Request $request)
    {
        $queryFilter  = (new InvoiceFilter)->filter($request);


        if(empty($queryFilter)){
            return InvoiceResource::collection(Invoice::with('user')->get());
        }

        $data = Invoice::with('user');

        if(!empty($queryFilter['whereIn'])){
            foreach($queryFilter['whereIn'] as $value){
                $data->whereIn($value[0], $value[1]);
            }
        }

        $resource = $data->where($queryFilter['where'])->paginate();

        return InvoiceResource::collection($resource);

        
    }
}