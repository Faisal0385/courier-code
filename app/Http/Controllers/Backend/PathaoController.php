<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Enan\PathaoCourier\Facades\PathaoCourier;
use Enan\PathaoCourier\Requests\PathaoStoreRequest;
use Flasher\Laravel\Http\Request;

class PathaoController extends Controller
{
    public function getCities()
    {
        $get_cities = PathaoCourier::GET_CITIES();
        $cities = $get_cities["data"]["data"];

        return response()->json([
            'cities' => $cities,
        ]);
    }

    public function getZones($id)
    {
        $get_zones = PathaoCourier::GET_ZONES($id);
        $zones = $get_zones["data"]["data"];

        return response()->json([
            'zones' => $zones,
        ]);
    }

    public function getAreas($id)
    {
        $get_areas = PathaoCourier::GET_AREAS($id);
        $areas = $get_areas["data"]["data"];

        return response()->json([
            'areas' => $areas,
        ]);
    }

    // public function index()
    // {
    //     $get_stores = PathaoCourier::GET_STORES();
    //     $stores     = $get_stores["data"]["data"];

    //     return view('admin.create-pathao-store.index', compact('stores','data'));
    // }

    // public function create()
    // {
    //     // $cities = PathaoCourier::GET_CITIES();
    //     // $zones  = PathaoCourier::GET_ZONES(1);
    //     // $areas  = PathaoCourier::GET_AREAS(1);

    //     $get_cities = PathaoCourier::GET_CITIES();
    //     $cities     = $get_cities["data"]["data"];



    //     return view('admin.create-pathao-store.create', compact('cities'));
    // }

    // public function store(PathaoStoreRequest $request)
    // {
    //     $abcd = PathaoCourier::CREATE_STORE($request);


    //     return view('admin.create-pathao-store.create');
    // }
}
