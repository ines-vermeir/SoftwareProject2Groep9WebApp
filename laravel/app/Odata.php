<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Odata extends Model
{
    public function employees(){
	
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

            return array($obj);

    }
}
