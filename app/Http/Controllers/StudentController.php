<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cohort;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeStudentMail;

class StudentController extends Controller
{
    public function index()
    {
        $students = User::students()->with('cohorts')->get(); //
        $cohorts = Cohort::all();

        return view('pages.students.index', compact('students', 'cohorts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'birthdate' => 'required|date',
            'cohort_id' => 'required|exists:cohorts,id',
        ]);

        $password = Str::random(10);

        $user = User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'birthdate' => $validated['birthdate'],
            'password' => Hash::make($password),
            'role' => 'student',
        ]);

        $user->cohorts()->attach($validated['cohort_id']);

        // Envoie du mail
        Mail::to($user->email)->send(new WelcomeStudentMail($user, $password));

        return response()->json(['success' => true, 'message' => 'Étudiant créé avec succès.']);
    }

    public function update(Request $request, User $student)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,' . $student->id,
            'birthdate' => 'required|date',
            'cohort_id' => 'required|exists:cohorts,id',
        ]);

        $student->update($validated);
        $student->cohorts()->sync([$validated['cohort_id']]);

        return response()->json(['success' => true, 'message' => 'Étudiant modifié avec succès.']);
    }

    public function destroy(User $student)
    {
        $student->delete();

        return response()->json(['success' => true, 'message' => 'Étudiant supprimé.']);
    }
}

