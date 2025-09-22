<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medilink Health Care - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/@blazeui/css@latest/dist/blaze.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .login-card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem 2rem;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .logo-section {
            text-align: center;
            margin-bottom: 0.5rem;
        }

        .medilink-logo {
            width: 120px;
            height: auto;
            margin: 0 auto;
            display: block;
        }

        .c-field {
            margin-bottom: 1.5rem;
        }

        .c-field__input {
            width: 100%;
            padding: 16px 20px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 400;
            background: #ffffff;
            color: #374151;
            transition: all 0.2s ease-in-out;
            box-sizing: border-box;
        }

        .c-field__input:focus {
            border-color: #2196F3;
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(33, 150, 243, 0.08);
            outline: none;
            transform: translateY(-1px);
        }

        .c-field__input::placeholder {
            color: #9ca3af;
            font-weight: 400;
        }

        .c-field__input:hover:not(:focus) {
            border-color: #9ca3af;
        }

        .checkbox-wrapper {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
        }

        .c-toggle--checkbox {
            margin-right: 10px;
            accent-color: #2196F3;
        }

        .checkbox-label {
            font-size: 0.875rem;
            color: #666;
            cursor: pointer;
        }

        .form-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 2rem;
        }

        .forgot-link {
            color: #666;
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.3s ease;
        }

        .forgot-link:hover {
            color: #2196F3;
        }

        .c-button--brand {
            background: #2196F3;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 25px;
            font-size: 0.875rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .c-button--brand:hover {
            background: #1976D2;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(33, 150, 243, 0.3);
        }

        .c-button--brand:active {
            transform: translateY(0);
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 2rem 1.25rem;
            }
            
            .form-footer {
                flex-direction: column;
                gap: 1.25rem;
                align-items: stretch;
                text-align: center;
            }
            
            .c-button--brand {
                width: 100%;
            }
        }

        .input-focus-effect {
            /* Removed - functionality moved to c-field__input */
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="logo-section">
            <img src="images/Logo Medilink.png" 
                 alt="Medilink Health Care Logo" 
                 class="medilink-logo">
        </div>

        <form id="loginForm" class="c-form">
            <div class="c-field">
                <input 
                    type="email" 
                    class="c-field__input" 
                    placeholder="E-mail"
                    autocomplete="email"
                    required
                >
            </div>

            <div class="c-field">
                <input 
                    type="password" 
                    class="c-field__input" 
                    placeholder="Password"
                    autocomplete="current-password"
                    required
                >
            </div>

            <div class="checkbox-wrapper">
                <input type="checkbox" id="remember" class="c-toggle c-toggle--checkbox">
                <label for="remember" class="checkbox-label">Remember me</label>
            </div>

            <div class="form-footer">
                <a href="#" class="forgot-link">Forgot your password?</a>
                <button type="submit" class="c-button c-button--brand">Log In</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@blazeui/js@latest/dist/blaze.min.js"></script>
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = this.querySelector('input[type="email"]').value;
            const password = this.querySelector('input[type="password"]').value;
            const remember = this.querySelector('input[type="checkbox"]').checked;
            
            if (email && password) {
                // Simulate loading
                const button = this.querySelector('button[type="submit"]');
                const originalText = button.textContent;
                button.textContent = 'Logging in...';
                button.disabled = true;
                
                setTimeout(() => {
                    alert('Login berhasil!\n\nEmail: ' + email + '\nRemember me: ' + (remember ? 'Yes' : 'No'));
                    button.textContent = originalText;
                    button.disabled = false;
                }, 1000);
            } else {
                alert('Mohon isi semua field');
            }
        });

        // Forgot password handler
        document.querySelector('.forgot-link').addEventListener('click', function(e) {
            e.preventDefault();
            alert('Fitur reset password akan segera tersedia');
        });

        // Add smooth animations to inputs
        const inputs = document.querySelectorAll('.c-field__input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.style.transform = 'translateY(-1px)';
            });
            
            input.addEventListener('blur', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>
</html>