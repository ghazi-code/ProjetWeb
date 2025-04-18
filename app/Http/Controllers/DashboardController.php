<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function overview () {
        $userRole = auth()->user()->school()->pivot->role;

        return view('pages.dashboard.dashboard-' . $userRole ,
            [
                'studentsCount' => User::count(),]);

    }
}

