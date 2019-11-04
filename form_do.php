<form method="POST" action="signup.php">
    <label for="name">Name: </label>
    <input type="text" name="name" placeholder="Name" required/>
    <label for="email">Email: </label>
    <input type="email" name="email" placeholder="Email" required/>
    <!-- Hash Password algo=md5-->
    <label for="email">Password: </label> 
    <input type="password" name="password" placeholder="Password" required/>
    
    <input type="submit" name="register" value="Register" />
</form>

<form method="POST" action="signin.php">
    <label for="name">Name: </label>
    <input type="text" name="name" placeholder="Name" required/>
    <label for="email">Email: </label>
    <input type="email" name="email" placeholder="Email" required/>
    <!-- Hash Password algo=md5-->
    <label for="email">Password: </label> 
    <input type="password" name="password" placeholder="Password" required/>
    
    <input type="submit" name="login" value="Login" />
</form>
<!-- pass = document.getElementById('password');
pass.value == confirm -->