@hasPermissionTo('list_frontend_users')
<li class="submenu-item">
    <a href="{{ route('backend.frontend-users.index') }}" data-menu-item="frontend-users">{{ __('general.frontend_users') }}</a>
</li>
@endhasPermissionTo
