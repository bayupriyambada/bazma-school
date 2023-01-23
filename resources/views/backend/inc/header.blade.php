<ul class="navbar-nav pt-lg-3">
    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <!-- Download SVG icon from http://tabler-icons.io/i/home -->
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
                Dashboard
            </span>
        </a>
    </li>

    <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle {{ request()->routeIs('pages.teacher.index', 'pages.teacher.create', 'pages.teacher.edit') ? 'show' : '' }}"
            href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button"
            aria-expanded="{{ request()->routeIs('pages.teacher.index', 'pages.teacher.create', 'pages.teacher.edit') ? 'true' : 'false' }}">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" />
                    <line x1="12" y1="12" x2="20" y2="7.5" />
                    <line x1="12" y1="12" x2="12" y2="21" />
                    <line x1="12" y1="12" x2="4" y2="7.5" />
                    <line x1="16" y1="5.25" x2="8" y2="9.75" />
                </svg>
            </span>
            <span class="nav-link-title">
                Master User
            </span>
        </a>
        <div
            class="dropdown-menu {{ request()->routeIs('pages.teacher.index', 'pages.teacher.create', 'pages.teacher.edit') ? 'show' : '' }}">
            <div class="dropdown-menu-columns">
                <div class="dropdown-menu-column">
                    <a class="dropdown-item {{ request()->routeIs('pages.teacher.index', 'pages.teacher.create', 'pages.teacher.edit') ? 'active' : '' }}"
                        href="{{ route('pages.teacher.index') }}">
                        Teacher
                    </a>
                </div>
            </div>
        </div>
    </li>
    <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="false"
            role="button" aria-expanded="false">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <!-- Download SVG icon from http://tabler-icons.io/i/package -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" />
                    <line x1="12" y1="12" x2="20" y2="7.5" />
                    <line x1="12" y1="12" x2="12" y2="21" />
                    <line x1="12" y1="12" x2="4" y2="7.5" />
                    <line x1="16" y1="5.25" x2="8" y2="9.75" />
                </svg>
            </span>
            <span class="nav-link-title">
                Master Data
            </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" href="{{ route('pages.career.index') }}">
                        Careers
                    </a>
                    <a class="dropdown-item" href="{{ route('pages.lesson.index') }}">
                        Lesson
                    </a>
                </div>
            </div>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle {{ request()->routeIs('pages.gallery.index', 'pages.gallery.create', 'pages.gallery.edit', 'pages.gallery.images.index', 'pages.gallery.images.create', 'pages.gallery.images.edit') ? 'show' : '' }}"
            href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button"
            aria-expanded="{{ request()->routeIs('pages.gallery.index', 'pages.gallery.create', 'pages.gallery.edit', 'pages.gallery.images.index', 'pages.gallery.images.create', 'pages.gallery.images.edit') ? 'true' : 'false' }}">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" />
                    <line x1="12" y1="12" x2="20" y2="7.5" />
                    <line x1="12" y1="12" x2="12" y2="21" />
                    <line x1="12" y1="12" x2="4" y2="7.5" />
                    <line x1="16" y1="5.25" x2="8" y2="9.75" />
                </svg>
            </span>
            <span class="nav-link-title">
                Gallery
            </span>
        </a>
        <div
            class="dropdown-menu {{ request()->routeIs('pages.gallery.index', 'pages.gallery.create', 'pages.gallery.edit', 'pages.gallery.images.index', 'pages.gallery.images.create', 'pages.gallery.images.edit') ? 'show' : '' }}"">
            <div class="dropdown-menu-columns">
                <div class="dropdown-menu-column">
                    <a class="dropdown-item {{ request()->routeIs('pages.gallery.index', 'pages.gallery.create', 'pages.gallery.edit') ? 'active' : '' }}"
                        href="{{ route('pages.gallery.index') }}">
                        Gallery Video
                    </a>
                    <a class="dropdown-item {{ request()->routeIs('pages.gallery.images.index', 'pages.gallery.images.create', 'pages.gallery.images.edit') ? 'active' : '' }}"
                        href="{{ route('pages.gallery.images.index') }}">
                        Gallery Images
                    </a>
                </div>
            </div>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle {{ request()->routeIs('pages.donation', 'pages.vision-mission') ? 'show' : '' }}"
            href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button"
            aria-expanded="{{ request()->routeIs('pages.donation', 'pages.vision-mission') ? 'true' : 'false' }}">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" />
                    <line x1="12" y1="12" x2="20" y2="7.5" />
                    <line x1="12" y1="12" x2="12" y2="21" />
                    <line x1="12" y1="12" x2="4" y2="7.5" />
                    <line x1="16" y1="5.25" x2="8" y2="9.75" />
                </svg>
            </span>
            <span class="nav-link-title">
                Pages
            </span>
        </a>
        <div
            class="dropdown-menu {{ request()->routeIs('pages.donation', 'pages.gallery.create', 'pages.gallery.edit', 'pages.vision-mission') ? 'show' : '' }}">
            <div class="dropdown-menu-columns">
                <div class="dropdown-menu-column">
                    <a class="dropdown-item {{ request()->routeIs('pages.donation') ? 'active' : '' }}"
                        href="{{ route('pages.donation') }}">
                        Donation
                    </a>
                    <a class="dropdown-item {{ request()->routeIs('pages.vision-mission') ? 'active' : '' }}"
                        href="{{ route('pages.vision-mission') }}">
                        Vision & Mission
                    </a>
                </div>
            </div>
        </div>
    </li>
    <li
        class="nav-item {{ request()->routeIs('pages.information.index', 'pages.information.create', 'pages.information.edit') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('pages.information.index') }}">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-info-square"
                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                    <rect x="4" y="4" width="16" height="16" rx="2"></rect>
                    <polyline points="11 12 12 12 12 16 13 16"></polyline>
                </svg>
            </span>
            <span class="nav-link-title">
                Information Data
            </span>
        </a>
    </li>
</ul>
