<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kyc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailVerifyController extends Controller
{
    public function emailVerify(Request $request)
    {
        // ✅ Validate request
        $validatedData = $request->validate([
            'email' => 'required|email',
        ]);

        // ✅ Update if exists or create new
        Kyc::updateOrCreate(
            ['user_id' => Auth::id()], // Search by user_id
            [ // Update or insert these fields
                'email' => $validatedData['email'] ?? null,
                'verify_email' => 1,
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

        // ✅ Redirect back with success message
        return redirect()->back()->with('success', 'Email updated successfully!');
    }
}
