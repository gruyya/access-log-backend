<?php

namespace App\Http\Controllers\Barrack;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class CreateBarrackController extends Controller
{
    public function __invoke(): Response
    {
       return Inertia::render('Barrack/Create');
    }
}