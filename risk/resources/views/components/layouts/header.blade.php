<header>
    <div class="navbar bg-green-400">
        <div class="navbar-start lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li>
                    <details>
                        <summary>Parent</summary>
                        <ul class="p-2">
                            <li><a>Submenu 1</a></li>
                            <li><a>Submenu 2</a></li>
                        </ul>
                    </details>
                </li>
            </ul>
        </div>
        <div class="navbar-center">
            <a class="btn btn-ghost text-xl">{{__("Proyecto")}}</a>
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
                    <li><a>{{__("Registrarse")}}</a></li>
                    <li><a>{{__("Iniciar sesión")}}</a></li>
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
                    tabindex="0"
                    class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                    <li><a>{{__("Logout")}}</a></li>
                </ul>
            </div>
        </div>
        @endauth
    </div>
</header>
