<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Reports;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
  public function index()
  {
      return view('admin.index', ['reports' => new Reports()]);
  }
}
