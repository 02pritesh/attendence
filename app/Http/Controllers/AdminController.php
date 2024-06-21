<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetails;
use Validator;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function home_page()
    {
        if(session()->has('admin'))
        {
            return view('admin.admin_home_page');
        }else if(session()->has('user')){
            return view('admin.home_page');
        }
       else{
        return redirect('/');
       }

       
    }

    public function add_user_detail(Request $request)
    {
        // Validate the incoming request
        $validate = Validator::make($request->all(), [
            "name" => "required",
            "mobile_no" => "required|max:15|min:10",
            "age" => "required",
            "dob" => "required|date",
            "joining_date" => "required|date",
            "position" => "required",
            "address" => "required|string",
            "experience" => "required",
            "country" => "required",
            "state" => "required",
            "city" => "required",
            "user_id" => "required|exists:users,id" // Validate that user_id exists in the users table
        ]);
    
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }else{

            $data = new UserDetails();

            $user_exists = UserDetails::where('user_id', $request->user_id)->exists();

            
           
            if($user_exists)
            {
                return redirect()->back()->with('fail','You have already submitted form!');
            }
            else
            {
                
                $data->name = $request->name;
                $data->mobile_no = $request->mobile_no;
                $data->age = $request->age;
                $data->dob = $request->dob;
                $data->joining_date = $request->joining_date; // Fix the typo here
                $data->position = $request->position;
                $data->address = $request->address;
                $data->experience = $request->experience;
                $data->city = $request->city;
                $data->state = $request->state;
                $data->country = $request->country;
                $data->user_id = $request->user_id; // Use the validated user_id directly
                // Save the user details
                $result = $data->save();
            
                if ($result) {
                    return redirect('home_page')->with('success', "Data Submitted Successfully!!");
                } else {
                    return redirect('home_page')->with('fail', "Data did not submit!");
                }
            }
        }
    }

    public function user_detail_info()
    {
        $data = User::with('userDetails')->get();
        return view('admin.user_detail_info',compact('data'));
    }
    
}
