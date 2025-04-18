<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cohort;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function overview()
    {
        $schoolId = auth()->user()->school()->id;

        return view('pages.dashboard.dashboard-admin', [
            'studentsCount' => DB::table('users_schools')
                ->where('school_id', $schoolId)
                ->where('role', 'student')
                ->count(),

            'teachersCount' => DB::table('users_schools')
                ->where('school_id', $schoolId)
                ->where('role', 'teacher')
                ->count(),

            // You said groupes is static: 6
            'groupsCount' => 6,

            // Optional: count promotions = unique cohorts? customize as needed
            'promotionsCount' => DB::table('cohorts')
                ->where('school_id', $schoolId)
                ->count(),
        ]);
    }
}
