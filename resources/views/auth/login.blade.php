

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <link rel="stylesheet" href="/css/styleLog.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            var toggleButton = document.getElementById("toggleButton");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleButton.textContent = "Hide"; 
            } else {
                passwordField.type = "password";
                toggleButton.textContent = "Show"; 
            }
        }
    </script>
    </head>
    
    <body>
        <div>

            @if(Session::has('success'))
            <div class="flash-message1" role="alert">
                {{ Session::get('success') }}
            </div>
            @endif
            @if(Session::has('loginError'))
            <div class="flash-message2" role="alert">
                {{ Session::get('loginError') }}
            </div>
            @endif
        </div>
        <div class="login-container">
            <h2>Login</h2>
            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" placeholder="Enter your Email" required>
                    @error('email')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="input-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Enter your Password" required>
                    <button type="button" id="toggleButton" onclick="togglePassword()">Show</button>
                    @error('password')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" >Login</button>
            <div class="singup">
                <p>
                    Don't have any account? <a href="{{route('register')}}">Sign Up</a>
                </p>
                
            </div>
        </form>
    </div>
</html>
