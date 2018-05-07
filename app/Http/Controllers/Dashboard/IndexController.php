<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            return redirect(route('admin::index'));
        }

        return view('dashboard.index');
    }
}
