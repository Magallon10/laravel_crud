<header>
    <div class="navbar bg-green-400">
       <x-layouts.lang />
        <div class="navbar-center">
            <a href="{{route("home")}}" class="btn btn-ghost text-xl">{{__("Home")}}</a>
        </div>
        @guest
        <div class="navbar-end">
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img
                            alt="Icono de usuario"
                            src="{{asset("images/usuario.png")}}" />
                    </div>
                </div>
                <ul
                    tabindex="0"
                    class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                    <li><a href="{{route('register')}}">{{__("Register")}}</a></li>
                    <li><a href="{{route('login')}}">{{__("Log in")}}</a></li>
                </ul>
            </div>
        </div>
        @endguest
        @auth
        <div class="navbar-end">
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img
                            alt="Icono de usuario"
                            src="{{asset("images/alumno.png")}}" />
                    </div>
                </div>
                <ul
                    tabindex="1"
                    class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">

                    <li> <form action="{{route("logout")}}" method="POST">
                            @csrf
                            <input class="btn" type="submit" value="Logout">
                        </form></li>
                </ul>
            </div>
        </div>
        @endauth
    </div>
</header>
