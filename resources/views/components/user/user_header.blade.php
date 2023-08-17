<header>
    <h1>Header</h1>
    <form action="/user/logout" method="post">
    @csrf
    <button type="submit">Logout</button>
    </form>
    <h1>Welcome back {{auth()->user()->fullname}}</h1>
</header>