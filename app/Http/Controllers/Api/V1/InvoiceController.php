<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Resources\V1\InvoiceResource;
use App\HttpResponse;
use Illuminate\Support\Facades\Validator;

class InvoiceController extends Controller
{
    use HttpResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return InvoiceResource::collection(Invoice::with('user')->get());
        // return InvoiceResource::collection(Invoice::with('user')->paginate());
    }

   
     
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'type' => 'required|max:1',
            'paid' => 'required|numeric|between:0,1',
            'payment_date' => 'nullable',
            'value' => 'required|numeric|between:1,9999.99'
        ]);

        if($validator->fails()){
            return $this->error('Dados invalidos', '422' , $validator->errors());
        }
        // else{
        //     return $this->error('Tudo certo', '200' , $validator->errors());
        // }

        $created = Invoice::create($validator->validated());

        if (!$created) {
        return $this->error(
        'Invoice not created',
        400,
        []
        );
        }
        
        return $this->response(
        'Invoice created',
        200,
        new InvoiceResource($created -> load('user'))
        
        );


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
