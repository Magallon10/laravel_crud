<x-layouts.layout>
    <div class="flex flex-row justify-center items-center min-h-full bg-gray-300">
        <!-- Session Status -->
        <form action="{{route("proyectos.update", $proyecto->id)}}" method="POST">
            @csrf
            @method("PUT")
            <div class="bg-white rounded-2xl p-5 grid grid-cols-1 gap-4">
                <div>
                    <x-input-label for="titulo" value="Titulo"/>
                    <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo"
                                  value="{{$proyecto->titulo}}"/>
                    @error("titulo")
                    {{--                            <x-input-error message="{{$errors->get('nombre') }}" />--}}
                    <x-input-error :messages="$errors->get('titulo')" class="mt-2" />

                    {{--                            <div class="text-sm text-red-600">--}}
                    {{--                                {{$message}}--}}
                    {{--                            </div>--}}
                    @enderror


                </div>
                <div>
                    <x-input-label for="horas_previstas" value="Horas previstas"/>
                    <x-text-input id="horas_previstas" class="block mt-1 w-full"
                                  type="number" name="horas_previstas"
                                  value="{{$proyecto->horas_previstas}}"
                                  required autofocus />

                    @error("horas_previstas")
                    <div class="text-sm text-red-600">
                        {{$message}}
                    </div>
                    @enderror

                </div>
                <div>
                    <x-input-label for="fecha_inicio" value="Fecha de Inicio" />

                    <x-text-input id="fecha_inicio" class="block mt-1 w-full"
                                  type="date" name="fecha_inicio"
                                  value="{{$proyecto    ->fecha_inicio}}"
                                  required autofocus autocomplete="Fecha de Inicio" />
                    @error("fecha_inicio")
                    <div class="text-sm text-red-600">
                        {{$message}}
                    </div>
                    @enderror



                </div>
                <div>
                    <button class= "btn btn-sm btn-success"  type="submit">{{__("Save")}} </button>
                    <a class= "btn btn-sm btn-error" href="{{route("proyectos.index")}}">{{__("Cancel")}}</a>
                </div>
            </div>
        </form>
</x-layouts.layout>
