<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\Bio;
use App\SocialLink;

class FrontpageController extends Controller
{
    public function index(){
       // echo json_encode(base64_encode('yiom@midnightcoder.xyz'));die();
        $projects = Project::all()->take(3);
        $bio = Bio::find(1);
        return view('welcome', compact('projects','bio'));
    }
}
