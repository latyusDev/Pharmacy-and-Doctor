<section>
    <form action='/user/login' method="post">
        @csrf
    
        <div>
            <label for="">Email</label>
        <input value="{{old('email')}}" type="email" name="email" required>
        @error('email')
           <p style="color:red"> {{$message}}</p>
        @enderror
        </div>
        
        <div>
            <label for=""> Password</label>
            <input  type="password" value="aaa" name="password" required>
    
        </div>
       
        <button type="submit">Sign in</button>
    
        <p>Don't have an account ? <a href="/user/register">Sign Up</a></p>
    
    
    </form>
</section>