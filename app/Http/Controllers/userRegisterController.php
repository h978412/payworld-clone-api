<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\point;
use App\Models\personal_profile;
use App\Models\business_profile;
use App\Models\document;

class userRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *php
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //creating array with user details
        $register_details = $request->validate([
            'firstName'  =>   'required',
            'lastName'   =>   'required',
            'email'      =>   'required|unique:users',
            'phone'      =>   'required|unique:users',
            'referedBy'  =>   'nullable',
            'password'   =>   'required',
        ]); 
        
        //save the user detail in databse in users table
        $user = User::create($register_details);

      //  define($_id,$user->user_id); 
        //creating array for point table details
        $point_detail = [
            'point_id'   =>   $user->user_id,
            'date'         =>   date("Y-m-d"),
            'forgot_password_points'   =>  0,
            'login_points'   =>   0,
            'referal_points' =>   0
        ];
       //intializing row for new user in points table
        $points = point::create($point_detail);

        //if user is referred by someone than updating referres point table with +1
        if($user->referedBy){
            $referrer = point::find($user->referedBy);
            $referrer->referal_points +=1;
            $referrer->save();
        }
        
        personal_profile::create([
            'personal_profile_id' => $user->user_id
        ]);

        business_profile::create([
            'business_profile_id' => $user->user_id
        ]);

        document::create([
            'document_id' => $user->user_id

        ]);
       return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        User:: where('email',$request->email)
              ->update(['password' => $request->new_password]);
        $user = User::where('email',$request->email)->first();
        if(!$user){
            return "user not found";
        }
       // $retailerId = $user['user_id'];
        $points = point::find($user->user_id);
        $points->forgot_password_points += 1;
        $points->save();
        return $points;
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
}
