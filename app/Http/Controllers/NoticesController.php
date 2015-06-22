<?php

namespace App\Http\Controllers;

use App;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

class NoticesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Guard $auth)
    {
        return $auth->user()->notices;
    }

    public function create()
    {
        $providers = App\Provider::lists('name', 'id');

        return view('notices.create', compact('providers'));
    }

    public function confirm(Requests\PrepareNoticeRequest $request, Guard $auth)
    {
        $template = $this->compileDmcaTemplate($data = $request->all(), $auth);

        session()->flash('dmca', $data);

        return view('notices.confirm', compact('template'));
    }

    public function compileDmcaTemplate($data, Guard $auth)
    {
        $data = $data + [
            'name' => $auth->user()->name,
            'email' => $auth->user()->email,
        ];

        $template = view()->file(app_path('Http/Templates/dmca.blade.php'), $data);

        return $template;
    }

    public function store(Request $request, Guard $auth)
    {
        $this->createNotice($request);

        return redirect('notices');
    }

    public function createNotice(Request $request)
    {
        $data = session()->get('dmca');

        $notice = App\Notice::open($data)->useTemplate($request->input('template'));

        $auth->user()->notices()->save($notice);
    }
}
