<div class="navigation-container" style="min-height: 50px">
    <nav class="navbar navbar-expand-lg fixed-top px-8 py-10" style="background-color: #9eff03;">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('product.index') }}">Electrify</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('product.index') ? 'active' : '' }}" href="{{ route('product.index') }}">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link
                            dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('product.category', '1') }}">Laptop</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('product.category', '2') }}">Tablet</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('product.category', '3') }}">Mouse</a></li>
                        </ul>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">About us</a>
                    </li> --}}
                </ul>

                <form action="{{ route('product.search', @$product->name) }}" class="d-flex" role="search"
                    method="GET">
                    @csrf
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                        name="search_input" style="width:500px !important;">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>

                @auth
                    <ul class="navbar-nav me-right mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link
                                dropdown-toggle" href="#"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="">Edit Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav me-right mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('register.index') ? 'active' : '' }}"
                                href="{{ route('register.index') }}">Register</a>
                        </li>

                        <li class="nav-item">
                            <div class="nav-link">|</div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('login') ? 'active' : '' }}" href="{{ route('login') }}">Log
                                in</a>
                        </li>
                    </ul>
                @endauth
            </div>
        </div>
    </nav>
</div>
