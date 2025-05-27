<?php

namespace App\Http\Controllers;

use App\Models\ac_supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendorController extends Controller
{
    function vendor_list(Request $request)
    {
         $search = $request->input('search', '');

        if ($search != '') {
            $supplier = ac_supplier::where('name', 'LIKE', "%$search%")->paginate(13);
        } else {
            $supplier = ac_supplier::paginate(13);
        }
        return view('admin.vendor.vendor_list', [
            'supplier' => $supplier,
            'search' => $search,
        ]);
    }

    function vendor_store(Request $request)
    {
        ac_supplier::insert([
            'name' => $request->name,
            'address' => $request->address,
            'email_address' => $request->email_address,
            'contact_no' => $request->contact_no,
            'created_at' => Carbon::now(),
        ]);

        return back();
    }

    function vendor_delete($id) {
        ac_supplier::find($id)->delete();
        return back();
    }

    function vendor_update(Request $request){
         DB::table('ac_suppliers')
            ->where('id', $request->id)
            ->update([
                'name' => $request->name,
                'address' => $request->address,
                'email_address' => $request->email_address,
                'contact_no' => $request->contact_no,

            ]);

        return back()->with('success', 'Account updated successfully.');
    }
}
