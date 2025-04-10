<?php

namespace App\Http\Controllers;
use App\Models\CompetencyAssessment;
use App\Models\LifeTask;

class CommonLifeController extends Controller
{
    public function index()
    {
        $user = auth()->user(); // Récupérer l'utilisateur authentifié

        // Récupérer les bilans de compétence et les tâches de vie commune
        $competencyAssessments = CompetencyAssessment::where('user_id', $user->id)->get();
        $lifeTasks = LifeTask::where('user_id', $user->id)->get();

        return view('pages.commonLife.index', compact('competencyAssessments', 'lifeTasks'));
    }
}
