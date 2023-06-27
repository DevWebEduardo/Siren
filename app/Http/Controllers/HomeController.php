<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ad;
use App\Models\Location;
use App\Models\PriceTimeType;
use App\Models\ProType;
use App\Models\AdType;


class HomeController extends Controller
{
    public function home(){
        $ad_type = AdType::All();
        $pri_type = PriceTimeType::All();
        $pro_type = ProType::All();
        $locations = Location::All();
        $context = [
            'adtype'=> $ad_type,
            'pritype'=> $pri_type,
            'protype'=> $pro_type,
            'locations'=> $locations,
        ];
        return view('home', $context);
    }

    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function dashboard()
    {
        $ads = Ad::where('user', auth()->user()->id)->get();
        $context = [
            'ads' => $ads,
        ];
        return view('dashboard', $context);
    }    

    public function account(){
        return view('account');
    }

    public function password_request(){
        
    }

    public function create()
    {
        $ad_type = AdType::All();
        $pri_type = PriceTimeType::All();
        $pro_type = ProType::All();
        $locations = Location::All();
        $context = [
            'adtype'=> $ad_type,
            'pritype'=> $pri_type,
            'protype'=> $pro_type,
            'locations'=> $locations,
        ];
        return view('create', $context);
    }

    public function newAd(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required|string',
            'email' => 'required|email|max:50',
            'site' => 'required|string|max:50',
            'tel' => 'required|string|max:60',
            'images' => 'required|array',
            'images.*' => 'mimes:jpeg,png',
            'price' => 'required|string|max:12',
            'pri_type' => 'required|string|max:2',
            'location' => 'required|string|max:2',
            'ad_type' => 'required|string|max:2',
            'pro_type' => 'required|string|max:2',
            'bedrooms' => 'required|string|max:2',
            'bathrooms' => 'required|string|max:2',
        ]);
        $images = $request->images;
        if (count($images) == 0){
            return view('/ad/create')->with('msg', __("At least one image is required."));
        }
        $stored_images = [];
        foreach ($images as $image) {
            $name = date('Ymd_His') . "_" . auth()->user()->id . md5($image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images/ads'), $name);
            $stored_images[] = $name;
        }
        $ad = new Ad;
        $ad->fill($validatedData);
        $ad->images = json_encode($stored_images);
        $ad->user= auth()->user()->id;
        $ad->save();
        return redirect('/dashboard')->with('msg','Saved');
    }
}
