<?php

namespace App\Http\Controllers;

use Inani\Larapoll\Poll;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function addAJAXOption(Poll $poll, Request $request)
    {
        try {
            $poll->attach($request->get('option'));
            return $poll->options->last()->only('name', 'id');
        } catch (\Exception $e) {
            return response($e->getMessage(), '500');
        }
    }
}
