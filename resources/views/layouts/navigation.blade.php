<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home.index') }}">
            <i class="fas fa-hotel me-2"></i> Damas<span>Hotel</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="fa fa-bars"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ms-auto justify-content-end w-100">
                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a href="{{ route('home.index') }}" class="nav-link">
                        <i class="fas fa-home me-1"></i> Home
                    </a>
                </li>
                <li class="nav-item {{ request()->is('about*') ? 'active' : '' }}">
                    <a href="{{ route('home.about') }}" class="nav-link">
                        <i class="fas fa-info-circle me-1"></i> About
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-concierge-bell me-1"></i> Services
                    </a>
                </li>
                <li class="nav-item {{ request()->is('rooms*') ? 'active' : '' }}">
                    <a href="{{ route('home.rooms') }}" class="nav-link">
                        <i class="fas fa-bed me-1"></i> Rooms
                    </a>
                </li>
                <li class="nav-item {{ request()->is('contact*') ? 'active' : '' }}">
                    <a href="{{ route('home.contact') }}" class="nav-link">
                        <i class="fas fa-envelope me-1"></i> Contact
                    </a>
                </li>

                @guest
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">
                            <i class="fas fa-sign-in-alt me-1"></i> Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">
                            <i class="fas fa-user-plus me-1"></i> Register
                        </a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user me-1"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    <i class="fas fa-user-cog me-1"></i> Profile
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.my_booking') }}">
                                    <i class="fas fa-calendar-check me-1"></i> My Bookings
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt me-1"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
                <li class="nav-item ml-lg-2">
                    <a href="{{ route('home.rooms') }}" class="nav-link btn-book text-white">Book Now</a>
                </li>
            </ul>
        </div>
    </div>
</nav>