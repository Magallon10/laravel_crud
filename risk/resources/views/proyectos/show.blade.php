<x-layouts.layout>
    <div class="flex flex-col items-center justify-center min-h-screen">
        <h1 class="text-2xl font-bold mb-4">Proyecto: {{$proyecto->id}}</h1>

        <table class="border border-gray-300 w-full max-w-lg text-center">
            <thead class="bg-gray-200">
            <tr>
                <th class="border border-gray-400 p-2">ID</th>
                <th class="border border-gray-400 p-2">Título</th>
                <th class="border border-gray-400 p-2">Horas previstas</th>
                <th class="border border-gray-400 p-2">Fecha de inicio</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="border border-gray-400 p-2">{{$proyecto->id}}</td>
                <td class="border border-gray-400 p-2">{{$proyecto->titulo}}</td>
                <td class="border border-gray-400 p-2">{{$proyecto->horas_previstas}}</td>
                <td class="border border-gray-400 p-2">{{$proyecto->fecha_inicio}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</x-layouts.layout>

