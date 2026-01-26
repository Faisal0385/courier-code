<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MerchantCourier;
use Illuminate\Http\Request;

class MerchantCourierController extends Controller
{
    /** Assign courier to merchant */
    public function store(Request $request, $merchantId)
    {
        $request->validate([
            'courier_id' => 'required|exists:courier_stores,id',
        ]);

        MerchantCourier::firstOrCreate([
            'merchant_id' => $merchantId,
            'courier_id'  => $request->courier_id,
        ]);

        return back()->with('success', 'Courier assigned successfully.');
    }

    /** Remove assigned courier */
    public function destroy(MerchantCourier $merchantCourier)
    {
        $merchantCourier->delete();

        return back()->with('success', 'Courier removed successfully.');
    }
}
