<?php

namespace App\Http\Controllers\auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use session;
class AuthController extends Controller
{
    //
    public function register(Request $request)
{
    $validate = Validator::make($request->all(), [
        "email" => "required|email|unique:users,email",
        "name" => "required",
        "password" => [
            'required',
            'string',
            // 'min:6',
            // 'regex:/[a-z]/',        // At least one lowercase letter
            // 'regex:/[A-Z]/',        // At least one uppercase letter
            // 'regex:/[0-9]/',        // At least one digit
            // 'regex:/[@$!%*#?&]/',   // At least one special character
        ]
    ]);

    if ($validate->fails()) {
        return response()->json([
            "message" => "Please enter required fields!",
            "errors" => $validate->errors()
        ], 401);
    }

    $data = new User();
    $data->name = $request->name;
    $data->email = $request->email;
    $data->password = encrypt($request->password);  // Encrypt the password
    $result = $data->save();

    if ($result) {
        return response()->json([
            "status" => "success",
            "message" => "Registration Successfully!",
            "data" => $data
        ], 200);
    } else {
        return response()->json([
            "status" => "error",
            "message" => "Registration failed!"
        ], 500);
    }
}

    public function show()
    {
        return view('auth.login');
        
    }


    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if ($user) {
            if ($user->role === 1) {
                // Decrypt the stored password
                $decryptedPassword = decrypt($user->password);  
                $request->session()->put('admin', $user->role);

                if ($decryptedPassword === $request->password) {
                    return redirect('admin_home_page')->with('success', "Login Successfully!");
                } else {
                    return redirect()->back()->with('fail', "Login failed because password is incorrect!");
                }
            }else if($user->role === 0){
                $decryptedPassword = decrypt($user->password);  
                $request->session()->put('user', $user->role);
                $request->session()->put('id', $user->id);

                if ($decryptedPassword === $request->password) {
                    return redirect('home_page')->with('success', "Login Successfully!");
                } else {
                    return redirect()->back()->with('fail', "Login failed because password is incorrect!");
                }
            } else {
                return redirect()->back()->with('fail', "Invalid Credential!");
            }
        } else {
            return redirect()->back()->with('fail', "Login failed because email ID is incorrect");
        }
    }
    
    public function logout(Request $request)
    {
        if (session()->has('admin')) {
            session()->flush();
            return redirect('/')->with('success', 'You have been logged out successfully.');
        } else if (session()->has('id')) {
            session()->flush();
            return redirect('/')->with('success', 'You have been logged out successfully.');
        } else {
            return redirect('/');
        }

    }
}