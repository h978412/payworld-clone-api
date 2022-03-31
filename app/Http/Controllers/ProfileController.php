<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\point;
use App\Models\personal_profile;
use App\Models\business_profile;
use App\Models\document;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::find($id);
        $personal_profile_details = personal_profile::find($id);
        $business_profile_details = business_profile::find($id);
        $document_details = document::find($id);
        $all = [
            'user' => $user,
            'personal_profile' => $personal_profile_details,
            'business_profile' => $business_profile_details,
            'document_details' => $document_details
         ];
        return $all;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function personal_profile_update(Request $request,$id)
        
       
    { 
        
        
        $personal_profile = $request->validate([
            'gender'          =>   'nullable',
            'date_of_birth'   =>   'nullable',
            'marital_status'  =>   'nullable',
            'education'       =>   'nullable|string|max:30',
            'country'         =>   'nullable|string|max:20',
            'state'           =>   'nullable|string|max:30',
            'address'         =>   'nullable|string|max:255',
            'pincode'         =>   'nullable|numeric|max:6',
        ]); 

            $user_profile = personal_profile::find($id);
           

            //using ternary expression to insure that if incoming request has a field as null it should not make a change
            //in database


                $user_profile->gender         =   ($request->gender==NUll)? $user_profile->gender : $request->gender ;
                $user_profile->date_of_birth  =   ($request->dob==NUll)?   $user_profile->date_of_birth: $request->dob;
                $user_profile->marital_status =   ($request->marital_status==NUll)? $user_profile->marital_status : $request->marital_status;
                $user_profile->education      =   ($request->education==NUll)? $user_profile->education: $request->education ;
                $user_profile->country        =   ($request->country==NUll)? $user_profile->country : $request->country;
                $user_profile->state          =   ($request->state==NUll)? $user_profile->state : $request->state;
                $user_profile->address        =   ($request->address==NUll)? $user_profile->address: $request->address;
                $user_profile->pincode        =   ($request->pincode==NUll)? $user_profile->pincode: $request->pincode ;

                $user_profile->save();
                return ;
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function business_profile_update(Request $request,$id)
    {
        $user_profile = business_profile::find($id);
        
        $user_profile->shop_name =( $request->shop_name==NUll)? $user_profile->shop_name:$request->shop_name;
        $user_profile->shop_category =( $request->shop_category==NUll)? $user_profile->shop_category: $request->shop_category;
        $user_profile->country = ($request->shop_country==NUll)? $user_profile->country: $request->shop_country;
        $user_profile->state = ($request->shop_state==NUll)? $user_profile->state: $request->shop_state;
        $user_profile->shop_address = ( $request->shop_address==NUll)? $user_profile->shop_address: $request->shop_address;
        $user_profile->GSTIN = ($request->GSTIN==NUll)? $user_profile->GSTIN: $request->GSTIN;


        $user_profile->save();
        return;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function document_update(Request $request, $id)
    {
        return;
    }

    public function update_all(Request $request,$id){

        $user = User::find($id);
        if(!$user){
            return "user not found";
        }else{
            $this->personal_profile_update($request,$user->user_id);
            
            $this->business_profile_update($request,$user->user_id);
            
            $this->document_update($request,$user->user_id);

            return $user;
        }
        
       // return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
}
