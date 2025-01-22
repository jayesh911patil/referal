<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #ff6f61, #ffab40);
            color: #ffffff;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            text-align: center;
            max-width: 600px;
            padding: 20px;
        }

        h1 {
            font-size: 6rem;
            margin-bottom: 10px;
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .button {
            display: inline-block;
            padding: 12px 24px;
            font-size: 1rem;
            color: #ff6f61;
            background-color: #ffffff;
            border: none;
            border-radius: 30px;
            text-decoration: none;
            transition: background 0.3s ease, color 0.3s ease;
        }

        .button:hover {
            background-color: #ff6f61;
            color: #ffffff;
        }

        .illustration {
            margin-bottom: 20px;
        }

        .illustration img {
            max-width: 100%;
            height: auto;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 4rem;
            }

            h2 {
                font-size: 1.5rem;
            }

            p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- <div class="illustration">
            <img src="https://via.placeholder.com/400x300" alt="404 Illustration">
        </div> -->
        <h1>404</h1>
        <h2>Oops! Page Not Found</h2>
        <p>The page you’re looking for doesn’t exist or has been moved.</p>
        
    </div>
</body>
</html>
