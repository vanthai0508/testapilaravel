
<html>
<head>
<link href="{{asset('css/create.css')}}" rel="stylesheet" >
</head>
    <div class="login-box">
        <h2>DANG KY</h2>
        <form  method="post" action="{{ url('/user/create')  }}" >
        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}"/>
            <div class="user-box">
                <input type="text" name="username" id="username" required="">
                <label>Username</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" id="password"  required>
                <label>Password</label>
            </div>
            <div class="user-box">
                <input type="text" name="email" id="email" required="">
                <label>Email</label>
            </div>
            <input type="submit" name="register" value="register">
                
      
        </form>
        <!-- <a href="index.php?Controller=user&Action=dangnhap">DANG NHAP</a> 
    
        pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number."
        
    pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Invalid email address"
-->
    </div>
</html>