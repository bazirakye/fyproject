<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rooms;
// use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Image;
use App\user;
use Auth;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $userid= Auth::id();   
     $hostel=DB::table('hostels')->where('custodian_id',$userid )->value('id');
        $rooms = Rooms::where('hostel_id',$hostel)->get();

        // var_dump($rooms);
         return view('custodian.rooms', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userid= Auth::id();
        $hostel=DB::table('hostels')->where('custodian_id',$userid )->value('id');
         return view('custodian.newroom' ,compact('hostel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
        $room = new Rooms();
        $room->hostel_id = $request->input('hostel_id');
        $room->room_no = $request->input('roomno');
        $room->room_type = $request->input('roomtype');
        $room->price = $request->input('price');
        $room->booking_price = $request->input('bookingprice');
        $room->description = $request->input('roomdescription');


                $request->validate([ 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images'), $imageName);
                $room->image=$imageName;

   

    
        $room->save(); 
         return redirect()->back()->with('info','room added successfully');

// var_dump($i);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $rooms = Rooms::all();
 
        return view('front.rooms', compact('rooms'));
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
        $room = Rooms::find($id);
        $room->delete();
        return redirect()->back()->with('success', 'Room deleted successfully');
    }
}
