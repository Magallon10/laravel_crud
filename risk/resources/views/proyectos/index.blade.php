<x-layouts.layout>
    <div class="p-2 bg-gray-200">
        <a class="btn btn-sm btn-primary " href="{{route("proyectos.create")}}">{{__("Make proyect")}}</a>
        <a class="btn btn-sm btn-secondary " href="{{route("home")}}">{{__("Back")}}</a>
    </div>
    <div class="max-h-full">
        <table class="table table-xs table-pin-rows table-pin-cols w-3/4">
            <thead>
            <tr>
                @foreach($campos as $campo)
                    <th>{{$campo}}</th>
                @endforeach
                <th>Numero alumnos</th>
            </tr>
            </thead>
            <tbody>
            @foreach($filas as $fila)
                <tr>
                    @foreach($campos as $campo)
                        <td>{{$fila->$campo}}</td>
                    @endforeach
                        <td>{{ $fila->alumno->count() }}</td>

                        {{--El edit--}}
                    <td>
                        <a href="{{route("proyectos.edit", $fila->id)}}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hover:text-blue-600 size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </a>

                    </td>
                    {{--                        delete --}}
                    <td>
                        <form id="formulario{{$fila->id}}" action="{{route("proyectos.destroy",$fila->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="button" onclick="confirmDelete(event, {{$fila->id}})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" hover:text-red-800 size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </form>
                    </td>
                    {{--                        Vero o show--}}
                    <td ><a class="hover:bg-gray-100 p-2" href="{{route("proyectos.show",$fila->id)}}">{{__("Show")}}</a></td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmDelete(event, id) {
            event.preventDefault(); // Evita el envío inmediato del formulario

            Swal.fire({
                title: "¿Confirmar borrado?",
                text: "Esta acción no se puede deshacer",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Sí, borrar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Buscar el formulario con el ID correcto
                    let formulario = document.querySelector(`#formulario${id}`);
                    if (formulario) {
                        formulario.submit();
                    } else {
                        console.error(`No se encontró el formulario con ID: formulario${id}`);
                    }
                }
            });
        }

    </script>

</x-layouts.layout>
