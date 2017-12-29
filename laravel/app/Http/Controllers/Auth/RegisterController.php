<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'fname' => 'required',
        ],[
            'fname.required' => 'FUCK U MATE',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {   
        function employees(){
	
            function after ($b, $inthat)
            {
                if (!is_bool(strpos($inthat, $b)))
                return substr($inthat, strpos($inthat,$b)+strlen($b));
            };
             function before ($b, $inthat)
            {
                return substr($inthat, 0, strpos($inthat, $b));
            };
            $json= file_get_contents('http://services.odata.org/V3/Northwind/Northwind.svc/Employees?$format=json');

            $obj = json_decode($json,true);

            return $obj;

         }
        

        $odata = array(); 
        $odata = employees();


        $userInput = strtolower($data['email']); 
        //$userInput = strtolower("nancy.davolio@student.ehb.be"); 
        // $userInput = "Andrew.Fuller@student.ehb.be"; 
        // $userInput = "Margaret.Peacock@student.ehb.be"; 
        $user= before('@', $userInput);
        $userNaam = after('.',  $user);
        $userVoornaam = before('.', $user);



        for($i=0; $i< count($odata["value"]);$i++){

            if($userVoornaam == strtolower($odata["value"][$i]["FirstName"])&&$userNaam == strtolower($odata["value"][$i]["LastName"]))	{

                
                $manager_id_loop = $odata["value"][$i]["ReportsTo"];
                $odata_id_loop = $odata["value"][$i]["EmployeeID"];
            } 
        }
        
        if ($manager_id_loop == null) {
            $manager_id_loop = 0;
        }

        $manager_id = $manager_id_loop;
        $odata_id = $odata_id_loop;
        

            return User::create([
            'id' => $odata_id,
            'fname' => $userVoornaam,
            'lname' => $userNaam,
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'manager_id' => $manager_id,
            'odata_id' => $odata_id
            ]);
        

        return view('home');
    }
    
        
}
