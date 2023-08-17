<section>
    <form action='/pharmacy/login' method="post">
        @csrf
        <div>
            <label for="">Email</label>
        <input value="{{old('email')}}" type="email" name="email">
        @error('email')
           <p style="color:red"> {{$message}}</p>
        @enderror
        </div>
        
        <div>
            <label for=""> Password</label>
            <input  type="password" value="aaa" name="password">
    
        </div>
       
        <button type="submit">Sign in</button>
    
        <p>Don't have an account ? <a href="/pharmacy/register">Sign Up</a></p>
    
    
    </form>
</section>