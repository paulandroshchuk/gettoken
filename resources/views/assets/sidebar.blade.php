<div class="card">
    <div class="card-header">
        Navigation
    </div>
    <ul class="list-group list-group-flush token-navigation-menu">
        <a class="list-group-item {{ isset($active) && $active === 'dashboard' ? 'active' : '' }}"
           href="{{ route('dashboard.index') }}">
            Dashboard
        </a>
        <a class="list-group-item {{ isset($active) && $active === 'gateways' ? 'active' : '' }}"
           href="{{ route('gateways.index') }}">
            Gateways
        </a>
        {{--<a class="list-group-item {{ isset($active) && $active === 'webhooks' ? 'active' : '' }}"--}}
           {{--href="{{ route('webhooks.index') }}">--}}
            {{--Webhooks--}}
        {{--</a>--}}
        <a class="list-group-item {{ isset($active) && $active === 'api' ? 'active' : '' }}"
           href="{{ route('api.index') }}">
            API
        </a>
        <a class="list-group-item {{ isset($active) && $active === 'settings' ? 'active' : '' }}"
           href="{{ route('settings.index') }}">
            Settings
        </a>
    </ul>
</div>
