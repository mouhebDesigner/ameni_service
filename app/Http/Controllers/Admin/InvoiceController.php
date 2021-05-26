<?php

namespace App\Http\Controllers\Admin;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    public function index(){
        $invoices = Invoice::where('requested', '1')->paginate(10);

        return view('admin.invoices.index', compact('invoices'));
    }

    public function refuse($invoice_id){
        $invoice = Invoice::find($invoice_id);

        $invoice->accept = '0';

        $invoice->save();

        return redirect()->back()->with('success', 'This invoice has accepted successfully');
    }
    

    public function accept($invoice_id){
        
        $invoice = Invoice::find($invoice_id);

        $invoice->accept = '1';

        $invoice->save();

        return redirect()->back()->with('success', 'This invoice has refused successfully');
    }

}
