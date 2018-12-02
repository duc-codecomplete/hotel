<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\District;
use App\Utility;
use App\Hotel;
use App\Comment;
use Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function postComment(Request $post, $id)
    {
    

        $comment = new Comment;
        $comment->body = $post->body;
        $comment->hotel_id = $id;
        $comment->save();
        return redirect('/hotels/'.$id);
    
            }
    public function getCreate()
    {
        
        return view('home.create');
    }

     public function postCreate(Request $request){
        
        
         $request->validate([
            'name' => 'required',
            'address' => 'required',
            'price' => 'required',
            //'txtarea' => 'required',
            'phone' => 'required',
            'description' => 'required',
            //'address' => 'required',
         ],
         [  
            'name.required' => 'Nhập tiêu đề bài đăng',
            'address.required' => 'Nhập địa chỉ khách sạn',
            'price.required' => 'Nhập giá thuê khách sạn',
            //'txtarea.required' => 'Nhập diện tích khách sạn',
            'phone.required' => 'Nhập SĐT chủ khách sạn (cần liên hệ)',
            'description.required' => 'Nhập mô tả ngắn cho khách sạn',
            //'txtaddress.required' => 'Nhập hoặc chọn địa chỉ phòng trọ trên bản đồ'
         ]);
        
         /* Check file */ 
         $json_img ="";
         if ($request->hasFile('images')){
            $arr_images = array();
            $inputfile =  $request->file('images');
            foreach ($inputfile as $image) {
               $namefile = "phongtro-".str_random(5)."-".$image->getClientOriginalName();
               while (file_exists('frontend/images'.$namefile)) {
                 $namefile = "phongtro-".str_random(5)."-".$image->getClientOriginalName();
               }
              $arr_images[] = $namefile;
              $image->move('frontend/images',$namefile);
            }
            $json_img =  json_encode($arr_images,JSON_FORCE_OBJECT);
         }
         else {
            $arr_images[] = "no_img_room.png";
            $json_img = json_encode($arr_images,JSON_FORCE_OBJECT);
         }
         /* tiện ích*/
         $json_utilities = json_encode($request->utilities,JSON_FORCE_OBJECT);
         /* ----*/ 
         /* get LatLng google map */ 
         
         /* New Phòng trọ */
         $hotel = new Hotel;
         $hotel->name = $request->name;
         $hotel->description = $request->description;
         $hotel->price = $request->price;
        
         
         $hotel->address = $request->address;
         $hotel->count_view = 0;
         $hotel->utilities = $json_utilities;
         $hotel->image = $json_img;
         $hotel->user_id = Auth::user()->id;
         
         $hotel->district_id = $request->district_id;
         $hotel->phone = $request->phone;
         $hotel->save();
         return redirect('/users/create')->with('success','Đăng tin thành công. Vui lòng đợi Admin kiểm duyệt');

      }

}
