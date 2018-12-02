<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\District;
use App\Utility;
use App\Hotel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::where('approve',1)->orderBy('count_view','DESC')->get();
        $districts = District::all();
        $best_hotel = Hotel::where('approve',1)->orderBy('count_view','DESC')->limit(4)->get();
        return view('index',compact('hotels','districts','best_hotel'));
    }

    public function getHotelDetail($id)
    {
        $hotel = Hotel::find($id);
        return view('home.detail',compact('hotel'));
    }

    public function search(Request $request)
    {
        //$name = $request->name;
        $district_id = $request->district_id;
        $price = $request->price;
        if($district_id == 0 && $price ==0){
            return redirect('')->with('empty','Dữ liệu không hợp lệ');
        }
        if($district_id !=0 && $price ==0){
                $hotels = Hotel::where('district_id',$district_id)->get();
                return view('search',compact('hotels'));
        }
        if($district_id ==0 && $price !=0){
            
                if($price == 1){
                    $hotels = Hotel::whereBetween('price', [500000, 1000000])->get();
                    return view('search',compact('hotels'));
                }
                if($price == 2){
                    $hotels = Hotel::whereBetween('price', [1000000, 1500000])->get();
                    return view('search',compact('hotels'));
                }
                if($price == 3){
                    $hotels = Hotel::whereBetween('price', [1500000, 2000000])->get();
                    return view('search',compact('hotels'));
                }
                if($price == 4){
                    $hotels = Hotel::where('price','>',2000000)->get();
                    return view('search',compact('hotels'));
                }
        }
        if($district_id !=0 && $price !=0){
            if($price == 1){
                    $hotels = Hotel::where('district_id',$district_id)->whereBetween('price', [500000, 1000000])->get();
                return view('search',compact('hotels'));
                }
                if($price == 2){
                    $hotels = Hotel::where('district_id',$district_id)->whereBetween('price', [1000000, 1500000])->get();
                    return view('search',compact('hotels'));
                }
                if($price == 3){
                    $hotels = Hotel::where('district_id',$district_id)->whereBetween('price', [1500000, 2000000])->get();
                    return view('search',compact('hotels'));
                }
                if($price == 4){
                    $hotels = Hotel::where('district_id',$district_id)->where('price','>',2000000)->get();
                    return view('search',compact('hotels'));
                }


        }
       }

    
}
