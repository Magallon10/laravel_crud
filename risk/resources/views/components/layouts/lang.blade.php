<div class="navbar-start lg:flex">
    <ul class="menu menu-horizontal px-1">
        <li>
            <details>
                <summary>{{ config( 'lang')[App::getLocale()]['name'] }}</summary>
                <ul class="p-2">
                    @foreach(config('lang') as $locale => $language)
                        <li><a href="{{route('language',$locale)}}">{{ $language['name'] }} {!! $language['flag'] !!}</a></li>

                    @endforeach
                </ul>
            </details>
        </li>
    </ul>
</div>
