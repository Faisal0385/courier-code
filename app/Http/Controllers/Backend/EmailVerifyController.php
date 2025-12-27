<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\EmailOtpMail;
use App\Models\Kyc;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class EmailVerifyController extends Controller
{
    public function emailVerify(Request $request)
    {
        ## ✅ Validate request
        $validatedData = $request->validate([
            'email' => 'required|email',
        ]);

        $otp = rand(100000, 999999); ## 6-digit OTP
        // $check = Kyc::where('user_id', '=', Auth::id())->first(['verify_email', 'verify_phone', 'status']);

        // if (!empty($check->verify_email) && !empty($check->verify_phone)) {
        ## ✅ Update if exists or create new
        Kyc::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'email'                => $request->email,
                'email_otp'            => $otp,
                'email_otp_expires_at' => Carbon::now()->addMinutes(5),
                'verify_email'         => 0
            ]
        );
        // }

        ## Send Mail
        Mail::to($request->email)->send(new EmailOtpMail($otp));

        ## ✅ Redirect back with success message
        return redirect()->back()->with('success', 'Email updated successfully!');
    }


    public function verifyEmailOtpPage()
    {
        return view('admin.emails.email-otp-verify-page');
    }

    public function verifyEmailOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric'
        ]);

        $kyc = Kyc::where('user_id', Auth::id())->first();

        if (!$kyc) {
            return back()->with('error', 'KYC record not found');
        }

        if ($kyc->email_otp !== $request->otp) {
            return back()->with('error', 'Invalid OTP');
        }

        if (now()->gt($kyc->email_otp_expires_at)) {
            return back()->with('error', 'OTP expired');
        }

        $kyc->update([
            'verify_email'         => 1,
            'email_otp'            => null,
            'email_otp_expires_at' => null
        ]);

        // Auto approve if phone also verified
        if ($kyc->verify_phone == 1) {
            $kyc->update(['status' => 1]);
        }

        return redirect()->route('admin.kyc.verification.page')
            ->with('success', 'Email verified successfully!');
    }
}
