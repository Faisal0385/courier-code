<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kyc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhoneVerifyController extends Controller
{
    public function phoneVerify(Request $request)
    {
        $validatedData = $request->validate([
            // Example: accepts digits, optional +, and must be unique
            'phone' => ['required', 'regex:/^\+?[0-9]{10,15}$/'],
        ]);

        Kyc::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'phone' => $validatedData['phone'],
                'verify_phone' => 1,
            ]
        );


        $check = Kyc::where('user_id', '=', Auth::id())->first(['verify_email', 'verify_phone', 'status']);

        if (!empty($check->verify_email) && !empty($check->verify_phone)) {
            Kyc::updateOrCreate(
                ['user_id' => Auth::id()], // Search by user_id
                [ // Update or insert these fields
                    'status' => 1,
                ]
            );
        }

        return redirect()->back()->with('success', 'Phone updated successfully!');
    }
}
