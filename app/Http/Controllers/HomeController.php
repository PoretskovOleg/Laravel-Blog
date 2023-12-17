<?php

namespace App\Http\Controllers;

use App\Contracts\HomeActionContract;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class HomeController extends Controller
{
    public function __invoke(HomeActionContract $action): Factory|Application|View
    {
        return view('home', $action(2));
    }
}
