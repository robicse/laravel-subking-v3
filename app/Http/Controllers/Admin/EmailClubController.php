<?php

namespace App\Http\Controllers\Admin;

use App\EmailClub;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmailClubController extends Controller
{
    public function index(){
        $emailClubs = EmailClub::all();
        return view('backend.admin.email_club.email_club_list', compact('emailClubs'));
    }
}
