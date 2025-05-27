<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Carbon\Carbon;
use CurlHandle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CustomerController extends Controller
{
    function customer_list(Request $request)
    {
         $search = $request->input('search', '');

        if ($search != '') {
            $all_customer = Customer::where('customer_name', 'LIKE', "%$search%")->paginate(13);
        } else {
            $all_customer = Customer::paginate(13);
        }

        return view('admin.customer.customer_list', [
            'all_customer' => $all_customer,
            'search' => $search,
        ]);
    }

    function add_customer()
    {
        return view('admin.customer.add_customer');
    }

    function customer_store(Request $request)
    {
        Customer::insert([
            'customer_name' => $request->customer_name,
            'other_id' => $request->other_id,
            'registration_no' => $request->registration_no,
            'address' => $request->address,
            'district' => $request->district,
            'postal_code' => $request->postal_code,
            'state' => $request->state,
            'region_id' => $request->region_id,
            'phone' => $request->phone,
            'fax' => $request->fax,
            'contract_person_name' => $request->contract_person_name,
            'contract_person_designation' => $request->contract_person_designation,
            'contact_person_photo' => $request->contact_person_photo,
            'mobile' => $request->mobile,
            'customer_code' => $request->customer_code,
            'email' => $request->email,
            'note' => $request->note,
            'obsolete' => $request->obsolete,
            'billing_address' => $request->billing_address,
            'delevery_address' => $request->delevery_address,
            'contract_person_phone' => $request->contract_person_phone,
            'contract_person_mobile' => $request->contract_person_mobile,
            'contract_person_email' => $request->contract_person_email,
            'employee_id' => $request->employee_id,
            'ic_no' => $request->ic_no,
            'salesman_id' => $request->salesman_id,
            'virtual_id' => $request->virtual_id,
            'salesman_incharge_1' => $request->salesman_incharge_1,
            'salesman_incharge_2' => $request->salesman_incharge_2,
            'paycommissionfor_1' => $request->paycommissionfor_1,
            'certificate_text' => $request->certificate_text,
            'current_status' => $request->current_status,
            'customer_type_ci' => $request->customer_type_ci,
            'customer_type_celcom' => $request->customer_type_celcom,
            'my_reseller_id' => $request->my_reseller_id,
            'territory_name' => $request->territory_name,
            'price_group_name' => $request->price_group_name,
            'opening_balance' => $request->opening_balance,
            'propritor_nid' => $request->propritor_nid,
            'trade_licence' => $request->trade_licence,
            'contract_person_name_1' => $request->contract_person_name_1,
            'contract_person_name_2' => $request->contract_person_name_2,
            'contract_person_mobile_1' => $request->contract_person_mobile_1,
            'contract_person_mobile_2' => $request->contract_person_mobile_2,
            'contract_person_phone_1' => $request->contract_person_phone_1,
            'contract_person_phone_2' => $request->contract_person_phone_2,
            'contract_person_designation_1' => $request->contract_person_designation_1,
            'contract_person_designation_2' => $request->contract_person_designation_2,
            'bank_name' => $request->bank_name,
            'account_name' => $request->account_name,
            'account_no' => $request->account_no,
            'bank_address' => $request->bank_address,
            'doc_propitor_nid' => $request->doc_propitor_nid,
            'doc_agrement_copy' => $request->doc_agrement_copy,
            'doc_trade_copy' => $request->doc_trade_copy,
            'created_at' => Carbon::now(),
        ]);
    }

    function customer_delete($id)
    {
        Customer::find($id)->delete();
        return back();
    }

    function customer_edit($id)
    {
        $customer_info = Customer::findOrFail($id);
        return view('admin.customer.customer_edit', [
            'customer_info' => $customer_info,
        ]);
    }

    function customer_update(Request $request){
        DB::table('customers')
            ->where('id', $request->id)
            ->update([
                'customer_name' => $request->customer_name,
                'other_id' => $request->other_id,
                'registration_no' => $request->registration_no,
                'address' => $request->address,
                'district' => $request->district,
                'postal_code' => $request->postal_code,
                'state' => $request->state,
                'phone' => $request->phone,
                'fax' => $request->fax,
                'contract_person_name' => $request->contract_person_name,
                'contract_person_designation' => $request->contract_person_designation,
                'contact_person_photo' => $request->contact_person_photo,
                'mobile' => $request->mobile,
                'customer_code' => $request->customer_code,
                'email' => $request->email,
                'note' => $request->note,
                'obsolete' => $request->obsolete,
                'billing_address' => $request->billing_address,
                'delevery_address' => $request->delevery_address,
                'contract_person_phone' => $request->contract_person_phone,
                'contract_person_mobile' => $request->contract_person_mobile,
                'contract_person_email' => $request->contract_person_email,
                'employee_id' => $request->employee_id,
                'ic_no' => $request->ic_no,
                'salesman_id' => $request->salesman_id,
                'virtual_id' => $request->virtual_id,
                'salesman_incharge_1' => $request->salesman_incharge_1,
                'salesman_incharge_2' => $request->salesman_incharge_2,
                'paycommissionfor_1' => $request->paycommissionfor_1,
                'certificate_text' => $request->certificate_text,
                'current_status' => $request->current_status,
                'customer_type_ci' => $request->customer_type_ci,
                'customer_type_celcom' => $request->customer_type_celcom,
                'my_reseller_id' => $request->my_reseller_id,
                'territory_name' => $request->territory_name,
                'price_group_name' => $request->price_group_name,
                'opening_balance' => $request->opening_balance,
                'propritor_nid' => $request->propritor_nid,
                'trade_licence' => $request->trade_licence,
                'security_deposite_amount' => $request->security_deposite_amount,
                'contract_person_name_1' => $request->contract_person_name_1,
                'contract_person_name_2' => $request->contract_person_name_2,
                'contract_person_mobile_1' => $request->contract_person_mobile_1,
                'contract_person_mobile_2' => $request->contract_person_mobile_2,
                'contract_person_phone_1' => $request->contract_person_phone_1,
                'contract_person_phone_2' => $request->contract_person_phone_2,
                'contract_person_designation_1' => $request->contract_person_designation_1,
                'contract_person_designation_2' => $request->contract_person_designation_2,
                'bank_name' => $request->bank_name,
                'account_name' => $request->account_name,
                'account_no' => $request->account_no,
                'bank_address' => $request->bank_address,
                'doc_propitor_nid' => $request->doc_propitor_nid,
                'doc_agrement_copy' => $request->doc_agrement_copy,
                'doc_trade_copy' => $request->doc_trade_copy,

            ]);

        return back()->with('success', 'Account updated successfully.');
    }
}
