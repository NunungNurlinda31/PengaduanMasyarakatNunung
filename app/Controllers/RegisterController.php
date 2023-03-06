<?php

namespace App\Controllers;
use App\Masyarakat;

class RegisterController extends BaseController{
    protected $masyarakats;
    function __construct()
    {
        $this->masyarakats = new Masyarakat();

    }
    public function index()
    {
        return voiew('register_view');
    }
    public function create()

    }
