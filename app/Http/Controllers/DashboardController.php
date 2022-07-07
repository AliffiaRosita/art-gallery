<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $countUser = User::count();
        $countArtwork = Artwork::count();

        return view('dashboard',[
            'countUser'=> $countUser,
            'countArtwork'=>$countArtwork
        ]);

    }
}
