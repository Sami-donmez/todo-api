<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected function successResponse($data = ""){
        $response = [];
        $response['success'] ="ok";
        if (!is_null($data)) {
            if (is_array($data) || is_object($data)) {
                $response['data']=$data;
            }
            if (is_string($data)) {
                $response['message'] = $data;
            }
        }

        return response()->json($response);

    }

    protected function errorResponse($code,$message){
        return response()->json([
            "success"=>"error",
            "message"=>$message
        ],$code);
    }
    protected function createdResponse($message){

    }
}
