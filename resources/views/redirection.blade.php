@if (Auth::user()->role=='admin')
    <a href="/display">Click here to be redirected to the admin page</a>
@elseif (Auth::user()->role=='member')
    <a href="/displayMember">Click here to be redirected to the member page</a>
@else
    <a href="/displayGuest">Click here to be redirected to the guest page</a>
@endif