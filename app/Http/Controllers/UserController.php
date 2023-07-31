<?php
namespace App\Http\Controllers;
use App\Models\User;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('User.index')->with(['own_posts' => $user->getOwnPaginateByLimit()]);
    }
}