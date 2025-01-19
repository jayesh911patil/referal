<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        /* General Reset */
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #fff;
            margin-bottom: 20px;
            font-size: 2.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        form {
            background: #ffffff;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 400px;
            animation: fadeIn 1.5s ease-in-out;
        }

        form input[type="text"],
        form input[type="email"],
        form input[type="password"] {
            width: 370px;
            padding: 12px 15px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s;
        }

        form input[type="text"]:focus,
        form input[type="email"]:focus,
        form input[type="password"]:focus {
            border-color: #6e8efb;
            outline: none;
            box-shadow: 0 0 10px rgba(110, 142, 251, 0.4);
        }

        form input[type="submit"] {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            color: white;
            border: none;
            padding: 14px 20px;
            width: 100%;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            transition: all 0.3s;
        }

        form input[type="submit"]:hover {
            background: linear-gradient(135deg, #a777e3, #6e8efb);
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        form span {
            font-size: 14px;
            color: #e74c3c;
        }

        form p {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        form p.success {
            color: #27ae60;
            font-weight: bold;
        }

        form p.error {
            color: #e74c3c;
            font-weight: bold;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Mobile Responsive */
        @media (max-width: 480px) {
            form {
                padding: 20px;
            }

            h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div>
        <h1>Create Your Account</h1>
        <form action="{{ route('registered') }}" method="POST">
        @csrf
            <input type="text" name="name" id="name" placeholder="Enter your name" value="{{ old('name') }}">
            @error('name')
            <span>{{ $message }}</span>
            @enderror

            <input type="email" name="email" id="email" placeholder="Enter your email" value="{{ old('email') }}">
            @error('email')
            <span>{{ $message }}</span>
            @enderror

            <input type="text" name="referral_code" id="referral_code" placeholder="Enter referral code (optional)" value="{{ old('referral_code') }}">

            <input type="password" name="password" id="password" placeholder="Create a password">
            @error('password')
            <span>{{ $message }}</span>
            @enderror

            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm your password">

            <input type="submit" value="Register">
        </form>

        @if (Session::has('success'))
            <p class="success">{{ Session::get('success') }}</p>
        @endif

        @if (Session::has('error'))
            <p class="error">{{ Session::get('error') }}</p>
        @endif
    </div>
</body>
</html>
