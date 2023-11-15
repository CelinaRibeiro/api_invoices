<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Invoice\InvoiceCreateRequest;
use App\Http\Requests\V1\Invoice\InvoiceUpdateRequest;
use App\Http\Resources\V1\InvoiceResource;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InvoiceController extends Controller
{

    public function index()
    {
        $invoices = Invoice::paginate();

        return InvoiceResource::collection($invoices);
    }

    public function store(InvoiceCreateRequest $request)
    {
        $data = $request->validated();

        $invoice = Invoice::create($data);

        return new InvoiceResource($invoice);
    }

    public function show($id)
    {
        $invoice = Invoice::findOrFail($id);

        return new InvoiceResource($invoice);
    }

    public function update(InvoiceUpdateRequest $request, string $id)
    {
        $invoice = Invoice::findOrFail($id);

        $data = $request->validated();
        $invoice->update($data);

        return new InvoiceResource($invoice);
    }

    public function destroy(string $id)
    {
        $invoice = Invoice::findOrFail($id);

        $invoice->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);

    }
}
