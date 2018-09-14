<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;

class UserController extends Controller
{
    public function showProfile(){
    	$user_info=User::find(Auth::id())->first();
    	return view('admin.profile')->with('user_info',$user_info);
    }

    public function editProfile(){
    	$user_info=User::find(Auth::id())->first();
        $date=explode('-',$user_info->date_of_birth);
        $user_info->year_of_birth=$date[0];
        $user_info->month_of_birth=$date[1];
        $user_info->day_of_birth=$date[2];
        $user_info->hobbies=explode(',', $user_info->hobbies);
    	return view('admin.edit_profile')->with('user_info',$user_info);
    }

    public function updateProfile(Request $request){
        $validator=Validator::make($request->all(), [
            'profile_picture' =>[
                'sometimes',
                'required',
                function($attribute,$value,$fail){
                    $avtar_extension=$value->getClientOriginalExtension();
                    if( !in_array($avtar_extension,array('jpg','png','gif') ) ){
                        $fail($attribute.' has not valid mime extension');
                    }

                }
            ],
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'address' => 'required|max:255',
            'gender' => 'required|string|in:male,female,other',
            'day_of_birth' => 'Required|Integer|Between:0,32',
            'month_of_birth' => 'Required|Integer|Between:0,13',
            'year_of_birth' => 'required|numeric',
            'hobbies' => 'required|array|min:1'
        ])->validate();

        $user = Auth::user();
        if($request->hasFile('profile_picture')) {
            // Get filename with extension            
            $filenameWithExt = $request->file('profile_picture')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
           // Get just ext
            $extension = $request->file('profile_picture')->getClientOriginalExtension();
            //Filename to store
            $avtar =  $user->username.'.'.$extension;                       
            // Upload Image
            $path = $request->file('profile_picture')->storeAs('public/avtars', $avtar);

            $user->profile_picture=$avtar;

        }
        
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->address=$request->address;
        $user->gender=$request->gender;
        $user->date_of_birth=$request->year_of_birth.'-'.$request->month_of_birth.'-'.$request->day_of_birth;
        $user->hobbies=implode(',',$request->hobbies);
        $user->save();
        return redirect('/profile')->with('user_updated','Your profile is successfully updated');
    }
}
