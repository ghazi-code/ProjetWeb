<x-app-layout>
    <x-slot name="header">
        <h1 class="flex items-center gap-1 text-sm font-normal">
            <span class="text-gray-700">
                {{ __('Vie Commune') }}
            </span>
        </h1>
    </x-slot>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Mon espace étudiant</title>
    </head>
    <body>
    <h1>Mes bilans et tâches</h1>

    <!-- Formulaire pour ajouter une tâche de vie commune -->
    <h2>Ajouter une tâche</h2>

        @csrf
        <label>Date :</label>
        <input type="date" name="date" required><br><br>

        <label>Titre de la tâche :</label>
        <input type="text" name="title" required><br><br>

        <label>Heure :</label>
        <input type="time" name="hour" required><br><br>

        <button type="submit">Ajouter</button>
    </form>

    <hr>

    <!-- Affichage des bilans de compétences -->
    <h2>Mes bilans de compétence</h2>
    <ul>
        @forelse ($competencyAssessments as $assessment)
            <li>
                {{ $assessment->title ?? 'Sans titre' }} - Statut : {{ $assessment->status }}
            </li>
        @empty
            <li>Aucun bilan pour le moment.</li>
        @endforelse
    </ul>

    <hr>

    <!-- Affichage des tâches de vie commune -->
    <h2>Mes tâches de vie commune</h2>
    <ul>
        @forelse ($lifeTasks as $task)
            <li>
                {{ $task->title }} ({{ $task->date }} à {{ $task->hour }}) - {{ $task->status }}
            </li>
        @empty
            <li>Aucune tâche enregistrée.</li>
        @endforelse
    </ul>
    </body>
    </html>

</x-app-layout>

