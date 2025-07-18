<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SIMRS</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
        }
        
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background-color: #ffffff;
        }
        
        .login-card {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid #e9ecef;
            max-width: 400px;
            width: 100%;
            padding: 40px 30px;
        }
        
        .logo-container {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .logo-container img {
            max-width: 120px;
            height: auto;
            margin-bottom: 20px;
        }
        
        .login-title {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 30px;
            text-align: center;
            font-size: 1.5rem;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        .form-label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 8px;
        }
        
        .btn-login {
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            width: 100%;
            color: white;
            font-size: 16px;
        }
        
        .btn-login:hover {
            background: linear-gradient(135deg, #869ab0ff 0%, #004085 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
            color: white;
        }
        
        .input-group-text {
            background-color: #f8f9fa;
            border: 2px solid #e9ecef;
            border-right: none;
            border-radius: 10px 0 0 10px;
            color: #6c757d;
        }
        
        .input-group .form-control {
            border-left: none;
            border-radius: 0 10px 10px 0;
        }
         
        
        .password-toggle {
            background-color: #f8f9fa;
            border: 2px solid #e9ecef;
            border-left: none;
            border-radius: 0 10px 10px 0;
            cursor: pointer;
            color: #6c757d;
            transition: all 0.3s ease;
        }
        
        .password-toggle:hover {
            background-color: #e9ecef;
            color: #495057;
        }
        
        
        
        .is-invalid {
            border-color: #dc3545 !important;
        }
        
        .invalid-feedback {
            display: block;
            width: 100%;
            margin-top: 0.25rem;
            font-size: 0.875em;
            color: #dc3545;
        }
        
        .alert {
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 12px 16px;
        }
        
        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }
        
        @media (max-width: 576px) {
            .login-card {
                margin: 10px;
                padding: 30px 20px;
            }
            
            .login-title {
                font-size: 1.25rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <!-- Logo -->
            <div class="logo-container">
                <img src="<?= base_url('img/logo_rs_baru.png') ?>" alt="Logo SIMRS" class="img-fluid">
                <h5 class="login-title">Sistem Informasi Manajemen Rumah Sakit</h5>
            </div>

            <!-- Login Form -->
            <form id="loginForm" action="<?= base_url('login') ?>" method="post">
                <?= csrf_field() ?>
                
                <!-- Flash Messages -->
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>
                
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>
                
                <?php if (session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Terjadi kesalahan:</strong>
                        <ul class="mb-0 mt-2">
                            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <!-- Alert untuk error JavaScript -->
                <div id="errorAlert" class="alert alert-danger d-none" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <span id="errorMessage"></span>
                </div>
                
                <!-- Username Field -->
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" 
                               class="form-control" 
                               id="username" 
                               name="username" 
                               placeholder="Masukkan username"
                               required>
                    </div>
                    <div class="invalid-feedback" id="usernameError"></div>
                </div>

                <!-- Password Field -->
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" 
                               class="form-control" 
                               id="password" 
                               name="password" 
                               placeholder="Masukkan password"
                               required>
                        <button class="btn password-toggle" type="button" id="togglePassword">
                            <i class="fas fa-eye" id="toggleIcon"></i>
                        </button>
                    </div>
                    <div class="invalid-feedback" id="passwordError"></div>
                </div>

                <!-- Login Button -->
                <div class="form-group">
                    <button type="submit" class="btn btn-login" id="loginBtn">
                        <i class="fas fa-sign-in-alt me-2"></i>
                        <span id="loginText">Login</span>
                        <span id="loginSpinner" class="spinner-border spinner-border-sm ms-2 d-none" role="status"></span>
                    </button>
                </div>
            </form>

            <!-- Footer -->
            <div class="text-center mt-4">
                <small class="text-muted">
                    Silahkan hubungi administrator jika Anda mengalami kesulitan login.
                </small>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Focus username
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('username').focus();
        });

        // toggle mata password
        document.getElementById('togglePassword').addEventListener('click', function() {
            const password = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (password.type === 'password') {
                password.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        });

        // Form Validasi
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const username = document.getElementById('username');
            const password = document.getElementById('password');
            const errorAlert = document.getElementById('errorAlert');
            const errorMessage = document.getElementById('errorMessage');
            const usernameError = document.getElementById('usernameError');
            const passwordError = document.getElementById('passwordError');
            const loginBtn = document.getElementById('loginBtn');
            const loginText = document.getElementById('loginText');
            const loginSpinner = document.getElementById('loginSpinner');
            
            // reset error 
            username.classList.remove('is-invalid');
            password.classList.remove('is-invalid');
            errorAlert.classList.add('d-none');
            usernameError.textContent = '';
            passwordError.textContent = '';
            
            let isValid = true;

            // Validasi username
            if (!username.value.trim()) {
                e.preventDefault();
                username.classList.add('is-invalid');
                usernameError.textContent = 'Username harus diisi';
                isValid = false;
            } else if (username.value.trim().length < 3) {
                e.preventDefault();
                username.classList.add('is-invalid');
                usernameError.textContent = 'Username minimal 3 karakter';
                isValid = false;
            }
            
            // Validasi password
            if (!password.value.trim()) {
                e.preventDefault();
                password.classList.add('is-invalid');
                passwordError.textContent = 'Password harus diisi';
                isValid = false;
            } else if (password.value.trim().length < 6) {
                e.preventDefault();
                password.classList.add('is-invalid');
                passwordError.textContent = 'Password minimal 6 karakter';
                isValid = false;
            }
            
            if (!isValid) {
                errorMessage.textContent = 'Mohon periksa data yang Anda masukkan';
                errorAlert.classList.remove('d-none');
                
                // Focus on first invalid field
                if (username.classList.contains('is-invalid')) {
                    username.focus();
                } else if (password.classList.contains('is-invalid')) {
                    password.focus();
                }
                
                return false;
            }
            
            // Jika validasi berhasil, submit form ke server
            // loading 
            loginBtn.disabled = true;
            loginText.textContent = 'Memproses...';
            loginSpinner.classList.remove('d-none');
            
            // Form akan di-submit secara normal ke server
        });

        // Real-time validasi
        document.getElementById('username').addEventListener('input', function() {
            const username = this;
            const usernameError = document.getElementById('usernameError');
            
            if (username.value.trim() && username.value.trim().length >= 3) {
                username.classList.remove('is-invalid');
                usernameError.textContent = '';
            }
        });

        document.getElementById('password').addEventListener('input', function() {
            const password = this;
            const passwordError = document.getElementById('passwordError');
            
            if (password.value.trim() && password.value.trim().length >= 6) {
                password.classList.remove('is-invalid');
                passwordError.textContent = '';
            }
        });

        // hide eerorr
        document.getElementById('username').addEventListener('focus', function() {
            document.getElementById('errorAlert').classList.add('d-none');
        });

        document.getElementById('password').addEventListener('focus', function() {
            document.getElementById('errorAlert').classList.add('d-none');
        });
    </script>
</body>
</html>
