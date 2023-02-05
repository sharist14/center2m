<?php

namespace App\Http\Controllers;
use App\Services\Car\Service;

class BaseController extends Controller
{
    public $service;

    function __construct(Service $service)
    {
        $this->service = $service;
    }
}