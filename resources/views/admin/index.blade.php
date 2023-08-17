{{-- <x-pharmacy_layout> --}}
    <section>
        <form action="/admin/logout" method="post">
            @csrf
            <button type="submit">Logout</button>
            </form>
        
            
        <h1>
            welcome back {{auth('admin')->user()->fullname}}
    </h1>
    
    <div>
        <ul>
            <li><a href="/admin/users">Users</a></li>
            <li><a href="/admin/pharmacies">pharmacies</a></li>
        </ul>
    </div>
    </section>
{{-- </x-pharmacy_layout> --}}