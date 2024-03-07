<div class="bg-white list-group list-group-light p-3">
    <a href="{{ route('admin.dashboard') }}"
       class="list-group-item list-group-item-action d-flex align-items-center px-3 border-0
    {{ request()->route()->getPrefix() == 'admin/dashboard' ? 'active' : '' }}"
       data-mdb-ripple-init aria-current="true">
        <i class="bi bi-speedometer2 me-2"></i>Dashboard
    </a>

    <a href="{{ route('admin.roomTypes') }}"
       class="list-group-item list-group-item-action d-flex align-items-center px-3 border-0
{{ request()->route()->getPrefix() == 'admin/roomTypes' ? 'active' : '' }}"
       data-mdb-ripple-init aria-current="true">
        <i class="bi bi-grid me-2"></i>Room Types
    </a>

    <a href="{{ route('admin.rooms') }}"
       class="list-group-item list-group-item-action d-flex align-items-center px-3 border-0
{{ request()->route()->getPrefix() == 'admin/rooms' ? 'active' : '' }}"
       data-mdb-ripple-init aria-current="true">
        <i class="bi bi-key me-2"></i>Rooms
    </a>

    <a href="{{ route('admin.employees') }}"
       class="list-group-item list-group-item-action d-flex align-items-center px-3 border-0
       {{ request()->route()->getPrefix() == 'admin/employees' ? 'active' : '' }}"
       data-mdb-ripple-init aria-current="true">
        <i class="bi bi-person-vcard me-2"></i>Employees
    </a>

    <a href="{{ route('admin.guests') }}"
       class="list-group-item list-group-item-action d-flex align-items-center px-3 border-0 {{ request()->route()->getPrefix() == 'admin/guests' ? 'active' : '' }}"
       data-mdb-ripple-init aria-current="true">
        <i class="bi bi-person me-2"></i>Guests
    </a>

    <a href="{{ route('admin.bookings') }}"
       class="list-group-item list-group-item-action d-flex align-items-center px-3 border-0
       {{ request()->route()->getPrefix() == 'admin/bookings' ? 'active' : '' }}"
       data-mdb-ripple-init aria-current="true">
        <i class="bi bi-receipt me-2"></i>Bookings
    </a>

    <a href="{{ route('admin.bookings') }}"
       class="list-group-item list-group-item-action d-flex align-items-center px-3 border-0
       {{ request()->route()->getPrefix() == 'admin/bookings' ? 'active' : '' }}"
       data-mdb-ripple-init aria-current="true">
        <i class="bi bi-person-workspace me-2"></i>Tasks Manager
    </a>

    <a href="{{ route('admin.services') }}"
       class="list-group-item list-group-item-action d-flex align-items-center px-3 border-0
       {{ request()->route()->getPrefix() == 'admin/services' ? 'active' : '' }}"
       data-mdb-ripple-init aria-current="true">
        <i class="bi bi-chat-heart me-2"></i>Services
    </a>

    <a href="{{ route('admin.ratings') }}"
       class="list-group-item list-group-item-action d-flex align-items-center px-3 border-0
       {{ request()->route()->getPrefix() == 'admin/ratings' ? 'active' : '' }}"
       data-mdb-ripple-init aria-current="true">
        <i class="bi bi-star me-2"></i>Ratings
    </a>

    <a href="{{ route('admin.settings') }}"
       class="list-group-item list-group-item-action d-flex align-items-center px-3 border-0
     {{ request()->route()->getPrefix() == 'admin/settings' ? 'active' : '' }}"
       data-mdb-ripple-init aria-current="true">
        <i class="bi bi-envelope me-2"></i>Emails
    </a>
</div>
