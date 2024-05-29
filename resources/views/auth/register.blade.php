
<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sing Up Page</title>
        <link rel="stylesheet" href="/css/styleLog.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <script>
function togglePassword(fieldId, buttonId) {
    var passwordField = document.getElementById(fieldId);
    var toggleButton = document.getElementById(buttonId);

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
        
        <div class="login-container">
            <h2>Sign Up</h2>
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="input-group">
                    <label for="name">name:</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required>
                    @error('name')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
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
                    <button type="button" id="toggleButtonPassword" onclick="togglePassword('password', 'toggleButtonPassword')">Show</button>
                    @error('password')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
    
                <div class="input-group">
                    <label for="password_confirmation">Password Confirmation:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Enter your Password Confirmation" required>
                    <button type="button" id="toggleButtonConfirmation" onclick="togglePassword('password_confirmation', 'toggleButtonConfirmation')">Show</button>
                    @error('password_confirmation')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <button type="submit">Sign Up</button>
            </form>
             <div class="singup">
                <p>
                    Already have any account? <a href="{{route('login')}}">Login</a>
                </p>
                
            </div>
        </div>
        
         
    </body>
        </html>