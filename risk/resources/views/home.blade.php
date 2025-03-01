<x-layouts.layout>
    @guest
    <div class="hero bg-base-200 min-h-screen">
        <div class="hero-content text-center">
            <div class="max-w-md">
                <h1 class="text-5xl font-bold text-green-500">{{__("Log in")}}</h1>
                <p class="py-6">
                   {{__("To access, please Log in")}}
                </p>
                <a class="btn btn-primary" href="{{route("login")}}">{{__("Log in")}}</a>
            </div>
        </div>
    </div>
    @endguest
    @auth
            <div class="hero bg-base-200 min-h-screen">
                <div class="hero-content text-center">
                    <div class="max-w-md">
                        <h1 class="text-5xl font-bold text-green-500">{{__("Welcome")}} {{auth()->user()->name}}</h1>

                        <a class="btn btn-primary m-10" href="{{route("proyectos.index")}}">{{__("Proyects")}}</a>
                    </div>
                </div>
            </div>
    @endauth
</x-layouts.layout>
