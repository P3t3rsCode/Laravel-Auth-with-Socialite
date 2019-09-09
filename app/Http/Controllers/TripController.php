<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;
use App\User;
use Carbon\Carbon; 
use App\UserInvites;
use App\TripUsers;
use Illuminate\Support\Facades\Auth;


class TripController extends Controller
{
    
    public function createTrip(Request $request){
        $user_id = Auth::id();
        //create a trip
        $request =  $request->all();
        $date =  Carbon::parse($request['trip_date']); 
        $request['trip_date']= $date;
        $request['created_by']=$user_id;
        $trip=Trip::create($request);
        
        //Add the creator to the trip
        TripUsers::create(
          [
            "trip_id"=>$trip->id,
            "user_id"=>$user_id,
            "total_spent"=>0
           ]   
          );


        //get user email and invite the users for th trip if they dont have an account
        $emails=$request['emails'];
        foreach($emails as $email){
           $user =  User::where('email','=',$email)->first();
         
           if($user==null){
               //create an invite list
             
               UserInvites::create(
                   [
                       "trip_id"=>$trip['id'],
                       "email"=>$email
                   ]
                   );
           }
           else{
                TripUsers::create(
                    [
                        "trip_id"=>$trip->id,
                        "user_id"=>$user->id,
                        "total_spent"=>0
                    ]
                    );
           }
        }
        return $trip;

    }
}
