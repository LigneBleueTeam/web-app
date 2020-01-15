<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

$GLOBALS['url_api'] = "http://lignebleue.ddns.net:8080/api/";


class ProgramController extends Controller
{
    public function index(Request $request){
        if ($request->session()->has('userId')) {
            $json = file_get_contents($GLOBALS['url_api'] . 'program/all');
            $data = json_decode($json);
            return view('programs')->with('programs', $data);
        } else{
            return redirect()->route('login');
        }        
    }

    public function addingprogram(Request $request){
        $arraydata = $request->all();
        unset($arraydata["_token"]);
        $data = json_encode($arraydata);
        //send data to api
        $ch = curl_init($GLOBALS['url_api'] . "program/save");
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
    public function editprogram($id){
        $json = file_get_contents($GLOBALS['url_api'] . 'program/' . $id);
        $data = json_decode($json);
        return view('editprogram')->with('data', $data);
    }

    public function editingprogram(Request $request){
        $arraydata = $request->all();
        unset($arraydata["_token"]);
        $data = json_encode($arraydata);

        //send data to api
        $ch = curl_init($GLOBALS['url_api'] . "program/" . $arraydata['programId']);
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
