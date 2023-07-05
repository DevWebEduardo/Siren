<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ad;
use App\Models\Location;
use App\Models\PriceTimeType;
use App\Models\ProType;
use App\Models\AdType;

use Illuminate\Support\Str;

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
        $ads = Ad::where('user', auth()->user()->id)
        ->orderBy('id', 'desc')
        ->get();
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
            'method'=> "PUT",
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
            'images.*' => 'mimes:jpeg,png|max:2048',
            'price' => 'required|string|max:12',
            'pri_type' => 'required|string|max:2',
            'location' => 'required|string|max:2',
            'ad_type' => 'required|string|max:2',
            'pro_type' => 'required|string|max:2',
            'bedrooms' => 'required|string|max:2',
            'bathrooms' => 'required|string|max:2',
        ]);
        $images = $request->images;
        if (count($images) == 0 || count($images) > 6){
            return redirect('/ad/create')->with('msg', __("From 1 to 6 images allowed"));
        }
        $stored_images = [];
        foreach ($images as $image) {
            $name = date('Ymd_His') . "_" . auth()->user()->id . "_" . md5($image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images/ads'), $name);
            $stored_images[] = $name;
        }
        $ad = new Ad;
        $ad->fill($validatedData);
        $ad->slug = Str::slug($request->title) . '-' . auth()->user()->id . '-' . now()->format('Ymd');
        $ad->images = json_encode($stored_images);
        $ad->user= auth()->user()->id;
        $ad->save();
        return redirect('/dashboard')->with('msg','Saved');
    }

    public function edit($id){
        $ad = Ad::where('id', $id)->where('user', auth()->user()->id)->first();
        if(!$ad){
            return redirect('/dashboard')->with('msg', "Not Found");
        }else{
            $ad_type = AdType::All();
            $pri_type = PriceTimeType::All();
            $pro_type = ProType::All();
            $locations = Location::All();
            $context = [
                'adtype'=> $ad_type,
                'pritype'=> $pri_type,
                'protype'=> $pro_type,
                'locations'=> $locations,
                'method'=> "PATCH",
                'ad'=> $ad,
                'id'=> $id,
            ];
            return view('create', $context);
        }
    }

    public function updateAd($id, Request $request){
        $validatedData = $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required|string',
            'email' => 'required|email|max:50',
            'site' => 'required|string|max:50',
            'tel' => 'required|string|max:60',
            'images' => 'array',
            'images.*' => 'mimes:jpeg,png|max:2048',
            'price' => 'required|string|max:12',
            'pri_type' => 'required|string|max:2',
            'location' => 'required|string|max:2',
            'ad_type' => 'required|string|max:2',
            'pro_type' => 'required|string|max:2',
            'bedrooms' => 'required|string|max:2',
            'bathrooms' => 'required|string|max:2',
        ]);

        $ad = Ad::where('id', $id)->where('user', auth()->user()->id)->first();
        if(!$ad){
            return redirect('/dashboard')->with('msg', "Not Found");
        }else{
            $ad->title = $validatedData['title'];
            $ad->description = $validatedData['description'];
            $ad->email = $validatedData['email'];
            $ad->site = $validatedData['site'];
            $ad->tel = $validatedData['tel'];
            $ad->price = $validatedData['price'];
            $ad->pri_type = $validatedData['pri_type'];
            $ad->location = $validatedData['location'];
            $ad->ad_type = $validatedData['ad_type'];
            $ad->pro_type = $validatedData['pro_type'];
            $ad->bedrooms = $validatedData['bedrooms'];
            $ad->bathrooms = $validatedData['bathrooms'];
            if($request->images && $request->images > 0){
                $stored_images = [];
                $old_ones = json_decode($ad->images);
                $images = $request->images;
                if (count($images) == 0 || count($images) > 6){
                    return redirect('/ad/create')->with('msg', __("From 1 to 6 images allowed"));
                }
                $stored_images = [];
                foreach ($images as $image) {
                    $name = date('Ymd_His') . "_" . auth()->user()->id . "_" .  md5($image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('assets/images/ads'), $name);
                    $stored_images[] = $name;
                }
                $ad->images = json_encode($stored_images);
            }
            $ad->update();
            if (isset($old_ones)){
                foreach($old_ones as $image){
                    $imagePath = public_path('assets/images/ads/' . $image);
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                }
            }
            return redirect('/dashboard')->with('msg','Updated');
        }
    }

    public function deleteAd($id){
        $ad = Ad::where('id', $id)->where('user', auth()->user()->id)->first();
        if(!$ad){
            return redirect('/dashboard')->with('msg', "Not Found");
        }
        $ad->delete();
        return redirect('/dashboard')->with('msg', "Ad removed");
    }
    
}
