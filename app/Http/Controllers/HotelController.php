<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Hotel;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HotelController extends Controller
{
    public function show_room()
    {
        $id = Auth::user()->id;
        $rooms = Hotel::where('user_id','=',$id)->get();;
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
        $room->user_id=Auth::user()->id;
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

        // $rooms =Hotel::all();
        // return view('hotel.room.index',compact('rooms'));
        $request->session()->flash('success','Room Deleted Successfully! ');
        return redirect()->route('show_room');
    }
    public function delete_room($id, Request $request)
    {
        $room = Hotel::findOrFail($id);
        File::delete(public_path().'/uploads/rooms/'.$room->image);
        $room->delete();
        $request->session()->flash('success','Room Added Successfully! ');
        return redirect()->route('show_room');
    }
    public function edit_room($id)
    {
        $data = Hotel::findOrFail($id);
        return view("hotel.room.update_room",['data'=>$data]);
    }
    public function update_room($id, Request $request)
    {
        $room = Hotel::find($id);
        $room->title=$request->title;
        $room->description=$request->description;
        $room->capacity=$request->capacity;
        $room->price=$request->price;
        $room->save();

        if ($request->image) {
            $oldImage = $room->image;
            $ext = $request->image->getClientOriginalExtension();
            $newFileName = time().'.'.$ext;
            $request->image->move(public_path().'/uploads/rooms/',$newFileName); // This will save file in a folder
            
            $room->image = $newFileName;
            $room->save();
            File::delete(public_path().'/uploads/rooms/'.$oldImage);
        }
        $request->session()->flash('success','Room Updated Successfully!');
        return redirect()->route('show_room');
    }




        
    
}
