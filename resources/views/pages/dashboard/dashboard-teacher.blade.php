{{-- resources/views/pages/dashboard/dashboard-teacher.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Welcome, Teacher!</h1>
    <p>Total number of students: {{ $studentsCount }}</p>
@endsection