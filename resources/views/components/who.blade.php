@if(Auth::guard('web')->check())
    <p class="text-success">
        you are login as user
    </p>

    @else
<p class="text-danger">
    you are logout as user
</p>

    @endif


@if(Auth::guard('admin')->check())
    <p class="text-success">
        you are login as admin
    </p>

@else
    <p class="text-danger">
        you are logout as admin
    </p>

@endif