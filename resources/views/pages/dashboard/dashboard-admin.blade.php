<x-app-layout>
    <x-slot name="header">
        <h1 class="flex items-center gap-1 text-sm font-normal">
            <span class="text-gray-700">
                {{ __('Dashboard') }}
            </span>
        </h1>
    </x-slot>

    <!-- begin: grid -->
    <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-stretch">
        <!-- Block 1 -->
        <div class="lg:col-span-2">
            <div class="grid">
                <div class="card card-grid h-full min-w-full">
                    <div class="card-header">
                        <h3 class="card-title">Vue d'ensemble</h3>
                    </div>
                    <div class="card-body flex flex-col gap-5">
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <!-- Promotions -->
                            <div class="p-4 bg-white shadow rounded text-center">
                                <div class="text-sm text-gray-500">Promotions</div>
                                <div class="text-2xl font-semibold text-blue-600">{{ $studentsCount }}</div>
                            </div>

                            <!-- Groupes (statique) -->
                            <div class="p-4 bg-white shadow rounded text-center">
                                <div class="text-sm text-gray-500">Groupes</div>
                                <div class="text-2xl font-semibold text-red-600">6</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Block 2 (zone libre ou à venir) -->
        <div class="lg:col-span-1">
            <div class="card card-grid h-full min-w-full">
                <div class="card-header">
                    <h3 class="card-title">Informations complémentaires</h3>
                </div>
                <div class="card-body flex flex-col gap-5">
                    <p class="text-gray-600 text-sm">Zone réservée pour de futurs widgets ou notifications.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end: grid -->
</x-app-layout>
