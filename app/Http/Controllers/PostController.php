<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
   
  public function index()
  {
    return view('ajaxPostForm');
  }

  public function store(Request $request)
  {
     $input = $request->all();
     $request->validate([
       'name' => 'required',
       'email' => 'required',
       'phone' => 'required'
     ]);
     $check = Post::create($input);
     $arr = array('msg' => 'Something goes to wrong. Please try again later', 'status' =>false);
     if($check){ 
        $arr = array('msg' => 'Successfully Form Submit', 'status' => true);
     }
    return response()->json($arr);
  }
}