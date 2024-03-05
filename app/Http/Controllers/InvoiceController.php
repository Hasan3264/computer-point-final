<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class InvoiceController extends Controller
{
    function download_invoice($order_id){
        $pdf = Pdf::loadView('invoice.invoice', [
            'order_id' => $order_id,
        ]);
        return $pdf->download('Invoice.pdf');
    }
}
