<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

$GLOBALS['url_api'] = "http://lignebleue.sytes.net:8080/api/";

class ActivityController extends Controller
{
    public function index(Request $request){
        if ($request->session()->has('userId')) {

            $json = file_get_contents($GLOBALS['url_api'] . 'activity/all');
            $data = json_decode($json);
            return view('activities')->with('activities', $data);
        } else{
            return redirect()->route('login');
        }
        
    }

    public function addingactivity(Request $request){
        $arraydata = $request->all();
        unset($arraydata["_token"]);
        $data = json_encode($arraydata);

        //send data to api
        $ch = curl_init($GLOBALS['url_api'] . "activity/save");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);                                                                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($data))                                                                          
        );                                                                                                                                                                                                                                      
        $result = curl_exec($ch);
        
        $arrayresult = json_decode($result, true);

        return (string) $arrayresult["success"];
    }
    public function editactivity($id){
        $json = file_get_contents($GLOBALS['url_api'] . 'activity/' . $id);
        $data = json_decode($json);
        return view('editactivity')->with('data', $data);
    }
    public function editingactivity(Request $request){
        $arraydata = $request->all();
        unset($arraydata["_token"]);
        $data = json_encode($arraydata);

        //send data to api
        $ch = curl_init($GLOBALS['url_api'] . "activity/" . $arraydata['activityId']);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");                                                                     
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);                                                                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($data))                                                                          
        );                                                                                                                                                                                                                                      
        $result = curl_exec($ch);
        $arrayresult = json_decode($result, true);

        return (string) $arrayresult["success"];
    }
}
