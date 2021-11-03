






<li class="nav-item">
    <a href="{{ route('postxes.index') }}"
       class="nav-link {{ Request::is('postxes*') ? 'active' : '' }}">
        <p>Postxes</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('ibadahs.index') }}"
       class="nav-link {{ Request::is('ibadahs*') ? 'active' : '' }}">
        <p>Ibadahs</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('jemaatV1s.index') }}"
       class="nav-link {{ Request::is('jemaatV1s*') ? 'active' : '' }}">
        <p>Jemaat V1S</p>
    </a>
</li>


