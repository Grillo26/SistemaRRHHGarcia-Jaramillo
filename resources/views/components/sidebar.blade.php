@php
$links = [
    [
        "href" => "dashboard",
        "text" => "Dashboard",
        "icon" => "fas fa-chart-line",
        "is_multi" => false,
    ],

    [
        "href" => [
            [
                "section_text" => "Usuarios",
                "icon" => "fas fa-user",
                "section_list" => [
                    ["href" => "user", "text" => "Gestionar Usuarios"],
                    ["href" => "user.new", "text" => "Crear Usuario"]
                ]
            ]
        ],
        "text" => "Usuarios",
        "is_multi" => true,
    ],
    [
        "href" => "turno",
        "text" => "Turnos",
        "icon" => "fas fa-calendar",
        "is_multi" => false,
    ],
    [
        "href" => "produccion",
        "text" => "Producción",
        "icon" => "fas fa-chart-line",
        "is_multi" => false,
    ]
];
$navigation_links = array_to_object($links);
@endphp

<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">
                <img class="d-inline-block" width="180px" height="" src="{{URL::asset('img/logosidebar.png')}}" alt="">
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">
                <img class="d-inline-block" width="50px" height="80px" src="{{URL::asset('img/logosimple.png')}}" alt="">
            </a>
        </div>
        @foreach ($navigation_links as $link)
        <ul class="sidebar-menu">
            <li class="menu-header">{{ $link->text }}</li>
            @if (!$link->is_multi)
            <li class="{{ Request::routeIs($link->href) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route($link->href) }}"><i class="{{ $link->icon }}"></i><span> {{ $link->text}} </span></a>
            </li>
            @else
                @foreach ($link->href as $section)
                    @php
                    $routes = collect($section->section_list)->map(function ($child) {
                        return Request::routeIs($child->href);
                    })->toArray();

                    $is_active = in_array(true, $routes);
                    @endphp

                    <li class="dropdown {{ ($is_active) ? 'active' : '' }}">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="{{ $section->icon}}"></i> <span>{{ $section->section_text }}</span></a>
                        <ul class="dropdown-menu">
                            @foreach ($section->section_list as $child)
                                <li class="{{ Request::routeIs($child->href) ? 'active' : '' }}"><a class="nav-link" href="{{ route($child->href) }}">{{ $child->text }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            @endif
        </ul>
        @endforeach
    </aside>
</div>
