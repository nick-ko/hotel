
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="{{URL::to('front/image/Logo.png')}}" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="active has-sub">
                    <a class="js-arrow" href="{{route('dash')}}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li>
                    <a href="{{route('book')}}">
                        <i class="fas fa-credit-card"></i>Reservation</a>
                </li>
                @if((Auth::user()->role) === 'admin')
                <li>
                    <a href="{{route('dashroom')}}">
                        <i class="fas fa-building"></i>Chambres</a>
                </li>
                <li>
                    <a href="{{route('category')}}">
                        <i class="fas fa-tasks"></i>Categorie</a>
                </li>
                <li>
                    <a href="{{route('stats')}}">
                        <i class="fas  fa-bar-chart-o"></i>Stats</a>
                </li>
                @endif
                <li>
                    <a href="{{route('dash.event')}}">
                        <i class="fas  fa-birthday-cake"></i>Evenements</a>
                </li>
                @if((Auth::user()->role) === 'admin')
                <li>
                    <a href="{{route('users')}}">
                        <i class="fas fa-user"></i>Utilisateurs</a>
                </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-desktop"></i>Site Web</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="">Acceuil</a>
                            </li>
                            <li>
                                <a href="{{route('dash.about')}}">A propos</a>
                            </li>
                            <li>
                                <a href="">Service</a>
                            </li>
                            <li>
                                <a href="">Evenement</a>
                            </li>
                            <li>
                                <a href="">Chambre & Suite</a>
                            </li>
                            <li>
                                <a href="">Contact</a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>
