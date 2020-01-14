<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;


$GLOBALS['url_api'] = "http://lignebleue.sytes.net:8080/api/";

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function actionlogin(Request $request){
        
        $json = file_get_contents($GLOBALS['url_api'] . 'user/all');
        $data = json_decode($json);
        $password = '';
        $email = '';
        $userId = '';
        $firstName ='';
        foreach($data as $user){
            foreach($user as $key => $value){
                if($key == "email" && $value == $request->email){
                    $email = $value;
                }
                if($key == "password"){
                    $password = $value;
                }
                if($key == "userId"){
                    $userId = $value;
                }
                if($key == "firstName"){
                    $firstName = $value;
                }
                if($key == "lastName"){
                    $lastName = $value;
                }
            }
        }
        if($email == ''){
            // account not found
            return view('login')->with('erreur', "Votre adresse mail n'a pas été trouvée.");
        } elseif($password == $request->password){
            // login
            $request->session()->push('userId', $userId);
            $request->session()->push('firstName', $firstName);
            $request->session()->push('lastName', $lastName);
            return redirect()->route('users');
        } else{
            // password not correct
            return view('login')->with('erreur', 'Le mot de passe est incorrect.');
        }

        return view('activities')->with('activities', $data);
    }
    
    public function index(Request $request){
        if ($request->session()->has('userId')) {
            $users = json_decode(file_get_contents($GLOBALS['url_api'] . 'user/all'));
            $activities = json_decode(file_get_contents($GLOBALS['url_api'] . 'activity/all'));
            $programs = json_decode(file_get_contents($GLOBALS['url_api'] . 'program/all'));

            
            $data = [
                'countusers'  => count($users),
                'countactivities' => count($activities),
                'countprograms' => count($programs),
                'lastuser1' => $users[count($users)-1],
                'lastuser2' => $users[count($users)-2],
                'lastuser3' => $users[count($users)-3],
                'lastuser4' => $users[count($users)-4],
            ];
            //dd($data['lastuser1']);
            return view('home')->with('data', $data);
        } else{
            return redirect()->route('login');
        }
    }

}
