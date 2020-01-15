<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;


$GLOBALS['url_api'] = "http://lignebleue.ddns.net:8080/api/";

class UserController extends Controller
{


    public function index(Request $request){
        if ($request->session()->has('userId')) {
            $json = file_get_contents($GLOBALS['url_api'] . 'user/all');
            $data = json_decode($json);
            return view('users')->with('users', $data);
        } else{
            return redirect()->route('login');
        }
    }

    public function addinguser(Request $request){
        $arraydata = $request->all();
        unset($arraydata["_token"]);
        $arraydata['password'] = '123123';
        $data = json_encode($arraydata);

        //send data to api
        $ch = curl_init($GLOBALS['url_api'] . "user/save");
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

    public function edituser($id){
        $json = file_get_contents($GLOBALS['url_api'] . 'user/' . $id);
        $data = json_decode($json);
        return view('edituser')->with('data', $data);
    }
    public function editinguser(Request $request){
        $arraydata = $request->all();
        unset($arraydata["_token"]);
        $data = json_encode($arraydata);

        //send data to api
        $ch = curl_init($GLOBALS['url_api'] . "user/" . $arraydata['userId']);
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
    public function httpPost($url, $data){
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
}
