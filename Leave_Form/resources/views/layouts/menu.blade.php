<!-- need to remove -->
<li class="nav-item">
    <a href="/leaveform" class="nav-link {{ Request::is('leaveform') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Leave Form</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>List of leave application</p>
    </a>
</li>

