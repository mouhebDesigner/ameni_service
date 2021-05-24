<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomersController extends Controller
{
    public function index()
    {
        $customers = User::where('grade', 'customer')->paginate(10);

        return view('admin.customers.index', compact('customers'));
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect('admin/customers')->with('deleted', 'Customer has deleted successfully');
        
    }
}
