<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kyc;
use App\Models\PaymentDetail;
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $merchants = User::where('role', '=', 'merchant')->count();
        $operators = User::where('role', '=', 'operator')->count();
        $stores = Store::count();

        $kyc = Kyc::where('user_id', '=', Auth::user()->id)->first('status');
        $paymentDetail = PaymentDetail::where('user_id', '=', Auth::user()->id)->first('status');

        return view('admin.index', compact('merchants', 'operators', 'stores','kyc'));
    }
}
