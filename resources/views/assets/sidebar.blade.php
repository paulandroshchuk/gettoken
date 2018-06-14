<div class="card">
    <div class="card-header">
        Navigation
    </div>
    <ul class="list-group list-group-flush token-navigation-menu">
        <a class="list-group-item {{ isset($active) && $active === 'dashboard' ? 'active' : '' }}" href="#">Dashboard</a>
        <a class="list-group-item" href="#">Billing</a>
        <a class="list-group-item" href="#">API</a>
        <a class="list-group-item" href="#">Settings</a>
    </ul>
</div>
