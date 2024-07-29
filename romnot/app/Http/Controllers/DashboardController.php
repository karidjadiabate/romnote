<?php

namespace App\Http\Controllers;

use App\Models\DemandeInscription;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $nbetablissementaccepte = DemandeInscription::where('accepted', 1)->count();
        $nbetablissementrefuse = DemandeInscription::where('rejected', 1)->count();
        $nbadmin = User::where('role_id', 3)->count();

        return view('admin.dashboard',compact('nbetablissementaccepte','nbetablissementrefuse','nbadmin'));
    }
}
