<?php


namespace Orti\Blogger\Controllers;


class PostController extends \Illuminate\Routing\Controller
{

    public function index(){
        return view('post::index');
    }
}