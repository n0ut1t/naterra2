<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">¡Bienvenido a Naterra, {{ Auth::user()->name }}! 🎮</h1>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                        <div class="bg-blue-500 text-white p-4 rounded-lg">
                            <h3 class="font-semibold">Tu Puntuación</h3>
                            <p class="text-3xl font-bold">{{ Auth::user()->total_points ?? 0 }}</p>
                        </div>
                        
                        <div class="bg-green-500 text-white p-4 rounded-lg">
                            <h3 class="font-semibold">Nivel Actual</h3>
                            <p class="text-3xl font-bold">{{ Auth::user()->current_level ?? 1 }}</p>
                        </div>
                        
                        <div class="bg-purple-500 text-white p-4 rounded-lg">
                            <h3 class="font-semibold">Capítulo</h3>
                            <p class="text-3xl font-bold">{{ Auth::user()->current_chapter ?? 1 }}</p>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('profile.edit') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">
                            Mi Perfil
                        </a>
                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2">
                            Comenzar Juego
                        </button>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Ver Ranking
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>