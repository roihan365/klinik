<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medilink Health Care - Register</title>
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

        .register-card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem 2rem;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1),
                        0 10px 10px -5px rgba(0, 0, 0, 0.04);
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
        }

        .form-footer {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 1rem;
            margin-top: 1rem;
            text-align: right;
        }

        .form-footer a {
            color: #2196F3;
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.3s ease;
        }

        .form-footer a:hover {
            color: #1976D2;
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
    </style>
</head>
<body>
    <div class="register-card">
        <div class="logo-section">
            <img src="images/Logo Medilink.png" 
                 alt="Medilink Health Care Logo" 
                 class="medilink-logo">
        </div>

        <form id="registerForm" class="c-form">
            <div class="c-field">
                <input type="text" class="c-field__input" placeholder="Name" required>
            </div>

            <div class="c-field">
                <input type="email" class="c-field__input" placeholder="E-mail" autocomplete="email" required>
            </div>

            <div class="c-field">
                <input type="password" class="c-field__input" placeholder="Password" autocomplete="new-password" required>
            </div>

            <div class="c-field">
                <input type="password" class="c-field__input" placeholder="Confirm Password" autocomplete="new-password" required>
            </div>

            <div class="form-footer">
                <p style="margin: 0;">Already registered? <a href="login.html">Login</a></p>
                <button type="submit" class="c-button c-button--brand">Register</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const name = this.querySelector('input[type="text"]').value;
            const email = this.querySelector('input[type="email"]').value;
            const password = this.querySelectorAll('input[type="password"]')[0].value;
            const confirmPassword = this.querySelectorAll('input[type="password"]')[1].value;

            if (!name || !email || !password || !confirmPassword) {
                alert('Mohon isi semua field');
                return;
            }

            if (password !== confirmPassword) {
                alert('Password dan Confirm Password tidak sama!');
                return;
            }

            const button = this.querySelector('button[type="submit"]');
            const originalText = button.textContent;
            button.textContent = 'Registering...';
            button.disabled = true;

            setTimeout(() => {
                alert('Registrasi berhasil!\n\nNama: ' + name + '\nEmail: ' + email);
                button.textContent = originalText;
                button.disabled = false;
                this.reset();
            }, 1000);
        });
    </script>
</body>
</html>
