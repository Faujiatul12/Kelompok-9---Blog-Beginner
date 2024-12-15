<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Budaya NTB</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #008B8B;
            margin: 0;
            padding: 0;
        }

        header {
            margin-top: 40px;
            background-color: #20B2AA;
            color: white;
            padding: 40px 0;
            border-radius: 8px;
        }

        header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        header p {
            font-size: 1.2rem;
            color: #f0f0f0;
        }

        .auth-buttons {
            margin-top: 20px;
        }

        .auth-buttons a {
            margin: 5px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .auth-buttons .login {
            background-color: #28A745;
        }

        .auth-buttons .login:hover {
            background-color: #218838;
        }

        .auth-buttons .register {
            background-color: #17A2B8;
        }

        .auth-buttons .register:hover {
            background-color: #138496;
        }

        .category {
            margin-top: 50px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .category-card {
            border: 1px solid #e0e0e0;
            border-radius: 15px;
            overflow: hidden;
            width: 300px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .category-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 1px solid #e0e0e0;
        }

        .category-card h3 {
            margin: 15px 0;
            color: #333;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .category-card a {
            display: block;
            margin: 15px;
            padding: 12px;
            background-color: #C4E538; 
            color: #fff; 
            border-radius: 5px; 
            text-decoration: none; 
            font-size: 1.1rem; 
            transition : background-color 0.3s ease , transform 0.3s ease ; 
         }
         
         .category-card a:hover { 
             background-color :#A3D900; 
             transform : scale(1.05); 
         }
         
         @media (max-width :768px) { 
             .category { 
                 flex-direction : column; 
                 align-items : center; 
             } 
             
             .category-card { 
                 width :90%; 
             } 
         }
    </style>
</head>
<body>
    <div class="container">
        <header class="text-center">
            <h1>Selamat Datang di Galeri Budaya NTB</h1>
            <p>Jelajahi ragam budaya dari provinsi Nusa Tenggara Barat</p>

           <!-- Tombol Login dan Register -->
           <div class="auth-buttons">
               <a href="{{ route('login') }}" class="login">Login</a>
               <a href="{{ route('register') }}" class="register">Register</a>
           </div>
       </header>

       <div class="category">
           <!-- Kategori Adat -->
           <div class="category-card">
               <img src="{{ asset('images/images.jpeg') }}" alt="Adat">
               <h3>Adat</h3>
               <a href="#" onclick="promptLogin()">Lihat Galeri Adat</a>
           </div>

           <!-- Kategori Budaya Tari -->
           <div class="category-card">
               <img src="{{ asset('images/tarian.jpeg') }}" alt="Tarian">
               <h3>Tarian Khas</h3>
               <a href="#" onclick="promptLogin()">Lihat Galeri Budaya Tari</a>
           </div>

           <!-- Kategori Makanan Khas -->
           <div class="category-card">
               <img src="{{ asset('images/makanan.jpeg') }}" alt="Makanan Khas">
               <h3>Makanan Khas</h3>
               <a href="#" onclick="promptLogin()">Lihat Galeri Makanan Khas</a>
           </div>
       </div>

       <!-- JavaScript function to prompt login -->
       <script>
           function promptLogin() {
               alert("Silakan login untuk mengakses galeri budaya.");
               // Optionally redirect to login page
               // window.location.href = "{{ route('login') }}";
           }
       </script>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>