<header>

    <form action="/pharmacy/logout" method="post">
    @csrf
    <button type="submit">Logout</button>
    </form>

    <div style="margin-bottom:1.5rem; ">
        <h1>
            welcome back {{auth('pharmacy')->user()->name}}
        </h1>
        <a href="/pharmacy">My drugs</a>
    </div>

</header>