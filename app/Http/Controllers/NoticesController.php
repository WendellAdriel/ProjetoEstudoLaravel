<?php

namespace App\Http\Controllers;

use App;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class NoticesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return 'All notices';
    }

    public function create()
    {
        $providers = App\Provider::lists('name', 'id');

        return view('notices.create', compact('providers'));
    }

    public function confirm(Requests\PrepareNoticeRequest $request)
    {
        return $request->all();
    }
}
