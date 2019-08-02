<nav class="py-4 bg-gray-200">
    <div class="container mx-auto flex justify-between items-center">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="images/logo.png" alt="" class="h-12">
        </a>

        <form action="" class="search">
            <input type="text" class="w-full text-xs py-1 px-5 bg-gray-300 border-1 border-gray-100" placeholder="Search">
        </form>

        <ul class="flex items-center">
            <!-- Authentication Links -->
            @guest
                <li class="mr-4">
                    <a class="button" href="{{ route('login') }}">{{ __('Log in') }}</a>
                </li>
                @if (Route::has('register'))
                    <li>
                        <a class="text-main font-bold hover:no-underline"
                           href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>