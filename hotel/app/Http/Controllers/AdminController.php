<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\District;
use App\Utility;
use App\Hotel;

class AdminController extends Controller
{
    public function index()
    {

    	return view('admin.index');
    }
// District 
// Controller
    public function getIndexDistrict()
    {
    	$districts = District::all();
    	return view('admin.districts.index',compact('districts'));
    }

    public function getCreateDistrict()
    {
    	return view('admin.districts.create');
    }

     public function postCreateDistrict(Request $post)
    {
    	$post->validate([
            'name' => 'required',
           
            
         ],
         [  
            'name.required' => 'Không được để trống.',
           
            
         ]);

    	$district = new District;
    	$district->name = $post->name;
    	$district->save();
    	return redirect('/admin/districts/')->with('success','Tạo mới thành công !');

    }

    public function getEditDistrict($id)
    {
    	$district = Category::find($id);
    	return view('admin.districts.edit',compact('district'));
    }

     public function postEditDistrict(Request $post, $id)
    {
    	$post->validate([
            'name' => 'required',
           
            
         ],
         [  
            'name.required' => 'Không được để trống.',
           
            
         ]);

    	$district = District::find($id);
    	$district->name = $post->name;
    	$district->save();
    	return redirect('/admin/districts/')->with('success','Cập nhật thành công !');
    }

    public function getDeleteDistrict($id)
    {
    	$district = District::find($id);
    	$district->delete();
    	return redirect('/admin/districts/')->with('success','Xóa thành công !');
    }

// Utility 
// Controller

    public function getIndexUtility()
    {
        $utilities = Utility::all();
        return view('admin.utilities.index',compact('utilities'));
    }

    public function getCreateUtility()
    {
        return view('admin.utilities.create');
    }

     public function postCreateUtility(Request $post)
    {
        $post->validate([
            'name' => 'required',
           
            
         ],
         [  
            'name.required' => 'Không được để trống.',
           
            
         ]);

        $utility = new Utility;
        $utility->name = $post->name;
        $utility->save();
        return redirect('/admin/utilities/')->with('success','Tạo mới thành công !');

    }

    public function getEditUtility($id)
    {
        $utility = Utility::find($id);
        return view('admin.utilities.edit',compact('utility'));
    }

     public function postEditUtility(Request $post, $id)
    {
        $post->validate([
            'name' => 'required',
           
            
         ],
         [  
            'name.required' => 'Không được để trống.',
           
            
         ]);

        $utility = Utility::find($id);
        $utility->name = $post->name;
        $utility->save();
        return redirect('/admin/utilities/')->with('success','Cập nhật thành công !');
    }

    public function getDeleteUtility($id)
    {
        $utility = Utility::find($id);
        $utility->delete();
        return redirect('/admin/utilities/')->with('success','Xóa thành công !');
    }

    // Hotel 
// Controller

 public function getIndexHotel()
    {
        $hotels = Hotel::where('approve','<>',0)->get();
        return view('admin.hotels.index',compact('hotels'));
    }

    public function getIndexHotelApprove()
    {
        $hotels = Hotel::where('approve',0)->get();
        return view('admin.hotels.approve',compact('hotels'));
    }

     public function approveHotel($id,$flag)
    {
        $hotel = Hotel::find($id);
        if ($flag==1){
            $hotel->approve = 1;
        }
        else 
        {
           $hotel->approve = 2;
        }
        
        $hotel->save();
        return redirect('/admin/hotels/')->with('success','Đã phê duyệt !');
    }

     public function getDeleteHotel($id)
    {
        $hotel = Hotel::find($id);
        $hotel->delete();
        return redirect('/admin/hotels')->with('success','Xóa thành công !');
    }

}
