<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelController extends Controller
{
    public function show_room()
    {
        $rooms =Hotel::all();
        return view('hotel.room.index',compact('rooms'));
    }
    public function room()
    {
        return view('hotel.room.add_room');
    }
    public function dashboard()
    {
        return view('hotel.dashboard');
    }
    public function add_room(Request $request)
    {
        $room = new Hotel;
        $room->title=$request->title;
        $room->description=$request->description;
        $room->capacity=$request->capacity;
        $room->price=$request->price;
        $room->save();

        if ($request->image) {
            $ext = $request->image->getClientOriginalExtension();
            $newFileName = time().'.'.$ext;
            $request->image->move(public_path().'/uploads/rooms/',$newFileName); // This will save file in a folder
            $room->image = $newFileName;
            $room->save();
        }

        $rooms =Hotel::all();
        return view('hotel.room.index',compact('rooms'));
    }
    public function delete_room($id)
    {
        $data=Hotel::find($id);
        $data->delete();
        return redirect()->back()->with('massage','room deleted successfully !');
    }




        
    
}
