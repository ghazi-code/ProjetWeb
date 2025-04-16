<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CohortController extends Controller
{
    // Toutes les promotions (si admin ou enseignant avec droits)
    public function index()
    {
        $cohorts = Cohort::all();
        return view('cohorts.index', compact('cohorts'));
    }

    // Promotions de l'enseignant connecté
    public function myCohorts()
    {
        $user = Auth::user();
        $cohorts = $user->cohorts; // grâce à la relation belongsToMany
        return view('cohorts.my', compact('cohorts'));
    }

    // Promotions de l'année en cours pour dashboard
    public function currentCohorts()
    {
        $user = Auth::user();
        $year = now()->year;

        $cohorts = $user->cohorts()
            ->where('year_start', '<=', $year)
            ->where('year_end', '>=', $year)
            ->get();

        return view('dashboard.partials.cohorts', compact('cohorts'));
    }
}