<x-app-layout>
    <x-slot name="header">
        <h1 class="flex items-center gap-1 text-sm font-normal">
            <span class="text-gray-700">
                {{ __('Vie Commune') }}
            </span>
        </h1>
    </x-slot>

    <div class="container">
        <h1>Bienvenue, {{ auth()->user()->name }}</h1>

        <h2>Bilans de compétence</h2>
        <table class="table">
            <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Statut</th>
            </tr>
            </thead>
            <tbody>
            @foreach($competencyAssessments as $assessment)
                <tr>
                    <td>{{ $assessment->title }}</td>
                    <td>{{ $assessment->description }}</td>
                    <td>{{ ucfirst($assessment->status) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <h2>Tâches de vie commune</h2>
        <table class="table">
            <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Statut</th>
            </tr>
            </thead>
            <tbody>
            @foreach($lifeTasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ ucfirst($task->status) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>

