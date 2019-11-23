<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{

    public function index(){
    	$data = ['data' => Todo::all()];
    	return response()->json($data);
    }

    public function show(Todo $id){
    	$data = ['data' => $id];
    	return response()->json($data);
    }

}
