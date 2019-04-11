<?php

namespace App\Http\Controllers;

use App\Models\NextClass;
use Illuminate\Http\Request;
use App\User;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Response;
use Illuminate\Support\Facades\DB;

class NextClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function retrieveEmail(){

        if(auth()==true) {  //if a student has succesfully logged in
            $user = new User();
            return $user->retrieveAuthorizedEmail();  //return their email
        }
    }

    public function getSchedules(){

        $client = new Client();
        $email = $this->retrieveEmail();//DO NOT DELETE
        //dd($email); DO NOT DELETE
        //$url = 'https://api.sandbox.csun.edu/metalab/roster/api/2.1/memberships/nr_'.$email.'/classes'; METALAB API DO NOT DELETE
        $url = 'https://2lgp8pinel.execute-api.us-west-2.amazonaws.com/default/roster-api'; //DUMMY API
        $response = $client->get($url);


        $results = $response->getBody()->getContents();
        $classes = json_decode($results)->classes;
        $classes[0]->class_number = '16087';
        $classes[0]->catalog_number = '282';
        $urlClass = 'https://api.metalab.csun.edu/curriculum/api/2.0/terms/Spring-2019/classes/'.$classes[0]->subject.'-'.$classes[0]->catalog_number;
        $response = $client->get($urlClass);
        $scheduleResults = $response->getBody()->getContents();
        $schedule = json_decode($scheduleResults);

        foreach ($schedule->classes as $schedules){

            $meetings = $schedules->meetings;
            foreach ($meetings as $location){

                $room[] = $location->location;
            }

        }

        return $room;

    }

    public function getSchedulesDB(){


        $id = '105751033';
        $tableid = NextClass::where('classes_members_members_id', $id)->get();
       // $tableid = NextClass::where('classes_members_members_id',$id)->pluck('classes_subject','classes_catalog_number'); //TRYING TO RETURN ALL INSTANCES OF USER ID TO RETURN THEIR CLASSES
        //$subject = $tableid->classes_subject;
      //  $catalog_number = $tableid->classes_catalog_number;
      //  dd($tableid);

       $s= DB::table('roster')->where('classes_members_members_id',$id)->get();

        $subset = $tableid->map(function ($tablei) {
            return collect($tablei->toArray())
                ->only(['classes_catalog_number'])
                ->all();});
        $subject = $tableid->map(function ($tablei) {
            return collect($tablei->toArray())
                ->only(['classes_subject'])
                ->all();});

       // dd($subset);
       // $s = $tableid->classes_catalog_number;
//        $client = new Client();
        //$response = [];

        $client = new Client();
        $urlClass = 'https://api.metalab.csun.edu/curriculum/api/2.0/terms/Spring-2019/classes/' . $subject. '-' . $subset;
        $response = $client->get($urlClass);
       // dd($response);
        foreach ($subset as $subsets) {

            $client = new Client();
            $urlClass = 'https://api.metalab.csun.edu/curriculum/api/2.0/terms/Spring-2019/classes/' . $subsets['classes_subject'] . '-' . $subsets['classes_catalog_number'];
            $response = $client->get($urlClass);
           // return [$client->get($urlClass)];
            $t[] = $response;
           // var_dump($t);
        }
        //dd($subsets->getBody());
//        foreach ($class as $classes){
//
//
//        }

        //dd($response);
        return $response;


    }


}
