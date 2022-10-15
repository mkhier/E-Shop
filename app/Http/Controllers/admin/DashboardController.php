<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('Admin.index');
    }
    public function users()
    {
        $users = User::all();
        return view('Admin.Users.index', compact('users'));
    }
    public function view_user($id)
    {
        $user = User::find($id);
        return view('Admin.Users.view', compact('user'));
    }
}
