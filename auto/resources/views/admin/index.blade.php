@auth
    @include('admin.dashboard.pages.dashboard')
@else
    @include('admin.login.pages.login')
@endauth