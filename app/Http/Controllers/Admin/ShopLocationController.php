<?php

namespace App\Http\Controllers\Admin;

use App\Career;
use App\ShopLocation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class ShopLocationController extends Controller
{

    public function index()
    {
        $shopLocations = ShopLocation::latest()->get();
        return view('backend.admin.shopLocation.index',compact('shopLocations'));
    }


    public function create()
    {
        return view('backend.admin.shopLocation.create');
    }

      public function store(Request $request)
    {
        $this->validate($request, [
            'location_title' =>  'required',
            'address' =>  'required',
            'phn_no' =>  'required',
            'open_close_time' =>  'required',
            'pick_up' =>  'required',
            'delivery' =>  'required',
        ]);

        $shopLocations = new ShopLocation();
        $shopLocations->location_title = $request->location_title;
        $shopLocations->address = $request->address;
        $shopLocations->phn_no = $request->phn_no;
        $shopLocations->open_close_time = $request->open_close_time;
        $shopLocations->pick_up = $request->pick_up;
        $shopLocations->delivery = $request->delivery;
        $shopLocations->lat = $request->lat;
        $shopLocations->lng = $request->lng;


        $shopLocations->save();
        Toastr::success('Shop Location created successfully !');
        return redirect()->route('admin.shopLocation.index');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $shopLocations = ShopLocation::find($id);
        return view('backend.admin.shopLocation.edit',compact('shopLocations'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'location_title' =>  'required',
            'address' =>  'required',
            'phn_no' =>  'required',
            'open_close_time' =>  'required',
            'pick_up' =>  'required',
            'delivery' =>  'required',
        ]);

        $shopLocations = ShopLocation::find($id);
        $shopLocations->location_title = $request->location_title;
        $shopLocations->address = $request->address;
        $shopLocations->phn_no = $request->phn_no;
        $shopLocations->open_close_time = $request->open_close_time;
        $shopLocations->pick_up = $request->pick_up;
        $shopLocations->delivery = $request->delivery;
        $shopLocations->lat = $request->lat;
        $shopLocations->lng = $request->lng;


        $shopLocations->save();
        Toastr::success('Shop Location Updated successfully !');
        return redirect()->route('admin.shopLocation.index');
    }


    public function destroy($id)
    {
        $shopLocations = ShopLocation::find($id);
        $shopLocations->delete();
        Toastr::success('Shop Location Deleted successfully !');
        return redirect()->back();
    }

    public function updateAddress(Request $request, $id){
        $shopLocations = ShopLocation::find($id);
        $shopLocations->address=$request->address;
        $shopLocations->lat=$request->lat;
        $shopLocations->lng=$request->lng;
        $shopLocations->update();

        Toastr::success('Shop Location Address successfully Updated!');
        return redirect()->back();
    }
}
