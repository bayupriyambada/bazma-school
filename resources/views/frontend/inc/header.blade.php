<ul class="navbar-nav">
    <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <polyline points="5 12 3 12 12 3 21 12 19 12" />
                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                </svg>
            </span>
            <span class="nav-link-title">
                Home
            </span>
        </a>
    </li>
    <li class="nav-item dropdown {{ request()->routeIs('p.gallery.images', 'p.gallery') ? 'active' : '' }}">
        <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" data-bs-auto-close="outside"
            role="button" aria-expanded="false">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-album" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <rect x="4" y="4" width="16" height="16" rx="2"></rect>
                    <path d="M12 4v7l2 -2l2 2v-7"></path>
                </svg>
            </span>
            <span class="nav-link-title">
                Gallery
            </span>
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item {{ request()->routeIs('p.gallery.images') ? 'active' : '' }}"
                href="{{ route('p.gallery.images') }}">
                Gallery Images
            </a>
            <a class="dropdown-item {{ request()->routeIs('p.gallery') ? 'active' : '' }}"
                href="{{ route('p.gallery') }}">
                Gallery Video
            </a>
        </div>
    </li>
    <li class="nav-item dropdown {{ request()->routeIs('p.teachers', 'p.students') ? 'active' : '' }}">
        <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" data-bs-auto-close="outside"
            role="button" aria-expanded="false">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                </svg>
            </span>
            <span class="nav-link-title">
                Group
            </span>
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item {{ request()->routeIs('p.teachers') ? 'active' : '' }}"
                href="{{ route('p.teachers') }}">
                Teachers
            </a>
            <a class="dropdown-item {{ request()->routeIs('p.students') ? 'active' : '' }}"
                href="{{ route('p.students') }}">
                Students
            </a>

        </div>
    </li>
    <li class="nav-item {{ request()->routeIs('p.career', 'p.career.details') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('p.career') }}">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-school" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6"></path>
                    <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4"></path>
                </svg>
            </span>
            <span class="nav-link-title">
                Career
            </span>
        </a>
    </li>
    <li class="nav-item {{ request()->routeIs('p.vision-mission') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('p.vision-mission') }}">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-files" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M15 3v4a1 1 0 0 0 1 1h4"></path>
                    <path d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z"></path>
                    <path d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2"></path>
                </svg>
            </span>
            <span class="nav-link-title">
                Vision & Mission
            </span>
        </a>
    </li>
    <li class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('contact') }}">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-address-book"
                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M20 6v12a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2z"></path>
                    <path d="M10 16h6"></path>
                    <circle cx="13" cy="11" r="2"></circle>
                    <path d="M4 8h3"></path>
                    <path d="M4 12h3"></path>
                    <path d="M4 16h3"></path>
                </svg>
            </span>
            <span class="nav-link-title">
                Contact
            </span>
        </a>
    </li>
    <li class="nav-item {{ request()->routeIs('p.information') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('p.information') }}">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-info-square" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                    <rect x="4" y="4" width="16" height="16" rx="2"></rect>
                    <polyline points="11 12 12 12 12 16 13 16"></polyline>
                </svg>
            </span>
            <span class="nav-link-title">
                Information
            </span>
        </a>
    </li>
</ul>
