<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kyc;
use App\Models\PaymentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KYCController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $data = Kyc::where('user_id', '=', $id)->first();
        $paymentDetail = PaymentDetail::where('user_id', '=', $id)->first();
        return view('admin.KYC.index', compact('data', 'paymentDetail'));
    } ## End Mehtod

    public function store(Request $request)
    {

        // ✅ Validate form fields
        $validated = $request->validate([
            'bin'    => 'nullable|string|max:255',
            'trade'  => 'nullable|string|max:255',
            'nid'    => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
            'selfie' => 'nullable|string',
        ]);

        // ✅ Find or create record (based on id or authenticated user)
        $kyc = Kyc::firstOrNew(['user_id' => Auth::user()->id ?? null]);

        // ✅ Assign basic fields
        $kyc->user_id = Auth::id();
        $kyc->bin     = $validated['bin'] ?? null;
        $kyc->trade   = $validated['trade'] ?? null;

        if (!empty($validated['phone']) && !empty($validated['email'])) {
            $kyc->status = 1;
        }

        // ✅ Handle NID upload
        if ($request->hasFile('nid')) {
            $nidFile = $request->file('nid');
            $nidName = uniqid() . '.' . $nidFile->getClientOriginalExtension();
            $nidPath = 'uploads/kyc/nid/';
            $nidFile->move(public_path($nidPath), $nidName);

            // Delete old file if exists
            if (!empty($kyc->nid) && file_exists(public_path($kyc->nid))) {
                @unlink(public_path($kyc->nid));
            }

            $kyc->nid = $nidPath . $nidName;
        }


        // ✅ Handle Selfie upload
        if (!empty($request->selfie)) {
            $photoData = $request->selfie;

            // Remove the part before base64 (like "data:image/png;base64,")
            $photo = str_replace('data:image/png;base64,', '', $photoData);
            $photo = str_replace(' ', '+', $photo); // Fix spaces

            // Generate a unique filename
            $fileName = 'selfie_' . time() . '.png';

            // Define full public path
            $directory = public_path('uploads/selfies');

            // Create folder if it doesn’t exist
            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }

            // Full file path
            $filePath = $directory . '/' . $fileName;

            // Save decoded image directly to public folder
            file_put_contents($filePath, base64_decode($photo));

            // 🗑️ Delete old file if exists
            if (!empty($kyc->selfie) && file_exists(public_path($kyc->selfie))) {
                @unlink(public_path($kyc->selfie));
            }

            // Save relative path for DB (for example: uploads/selfies/selfie_123.png)
            $kyc->selfie = 'uploads/selfies/' . $fileName;
        }

        // ✅ Save record
        $kyc->save();

        // ✅ Return success message
        return redirect()->back()->with('success', 'KYC verification information saved successfully.');
    }

    public function PaymentDetailStore(Request $request)
    {
        // ✅ Validate request
        $validatedData = $request->validate([
            'bkash'          => 'nullable|string',
            'nagod'          => 'nullable|string',
            'bank_name'      => 'nullable|string',
            'bank_account'   => 'nullable|string',
            'branch_name'    => 'nullable|string',
            'account_holder' => 'nullable|string',
            'account_no'     => 'nullable|string',
        ]);

        // ✅ Update if exists or create new
        PaymentDetail::updateOrCreate(
            ['user_id' => Auth::id()], // Search by user_id
            [ // Update or insert these fields
                'bkash'          => $validatedData['bkash'] ?? null,
                'nagod'          => $validatedData['nagod'] ?? null,
                'bank_account'   => $validatedData['bank_account'] ?? null,
                'bank_name'      => $validatedData['bank_name'] ?? null,
                'branch_name'    => $validatedData['branch_name'] ?? null,
                'account_holder' => $validatedData['account_holder'] ?? null,
                'account_no'     => $validatedData['account_no'] ?? null,
            ]
        );

        // ✅ Redirect back with success message
        return redirect()->back()->with('success', 'Payment details saved successfully!');
    }
}
