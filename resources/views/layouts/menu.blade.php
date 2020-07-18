
<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-user-circle"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('pendakis*') ? 'active' : '' }}">
    <a href="{{ route('pendakis.index') }}"><i class="fa fa-user"></i><span>Pendakis</span></a>
</li>

<li class="{{ Request::is('regus*') ? 'active' : '' }}">
    <a href="{{ route('regus.index') }}"><i class="fa fa-users"></i><span>Regus</span></a>
</li>

<li class="{{ Request::is('perlengkapans*') ? 'active' : '' }}">
    <a href="{{ route('perlengkapans.index') }}"><i class="fa fa-cubes"></i><span>Perlengkapans</span></a>
</li>

<li class="{{ Request::is('jalurs*') ? 'active' : '' }}">
    <a href="{{ route('jalurs.index') }}"><i class="fa fa-map"></i><span>Jalurs</span></a>
</li>

