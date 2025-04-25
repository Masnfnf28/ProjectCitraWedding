<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>CITRA WEDDING ORGANIZER</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #fffafc;
        }

        .navbar {
            transition: background-color 0.3s ease;
        }

        .navbar.scrolled {
            background-color: rgba(255, 255, 255, 0.95) !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .hero {
            height: 100vh;
            background: url('https://images.unsplash.com/photo-1639330907580-1be70acbc1e1?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') center/cover no-repeat;
            color: white;
            display: flex;
            align-items: center;
            text-align: center;
            font-weight: 100;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.7);
        }

        .btn-wedding {
            background-color: #d63384;
            color: white;
            border: none;
        }

        .btn-wedding:hover {
            background-color: #c2185b;
        }

        footer {
            background-color: #d63384;
            color: white;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark position-absolute w-100" style="background-color: rgba(255, 255, 255, 0.9); backdrop-filter: blur(5px);">
    <div class="container">
        <!-- Logo di kiri -->
        <a class="navbar-brand fw-bold" href="#"
            style="color: #d4af37; font-family: 'Playfair Display', serif; font-size: 1.5rem;">
            CITRA WEDDING ORGANIZER
        </a>

        <!-- Tombol Toggle (Mobile) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon" style="filter: brightness(0.8);"></span>
        </button>

        <!-- Menu Navigasi -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Menu Tengah -->
            <ul class="navbar-nav mx-auto">
                <li class="nav-item px-2">
                    <a class="nav-link" href="#paket"
                        style="color: #333; font-weight: 500; transition: color 0.3s;"
                        onmouseover="this.style.color='#d4af37'" onmouseout="this.style.color='#333'">Paket</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link" href="#tentang"
                        style="color: #333; font-weight: 500; transition: color 0.3s;"
                        onmouseover="this.style.color='#d4af37'" onmouseout="this.style.color='#333'">Tentang</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link" href="#testimoni"
                        style="color: #333; font-weight: 500; transition: color 0.3s;"
                        onmouseover="this.style.color='#d4af37'" onmouseout="this.style.color='#333'">Testimoni</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link" href="#kontak"
                        style="color: #333; font-weight: 500; transition: color 0.3s;"
                        onmouseover="this.style.color='#d4af37'" onmouseout="this.style.color='#333'">Kontak</a>
                </li>
            </ul>
            
            <!-- Tombol Kanan -->
            <div class="d-flex ms-lg-auto">
                <a class="btn btn-outline-light rounded-pill px-3 me-2" href="/login"
                    style="color: #fff; background-color: #d4af37; border: 1px solid #d4af37; font-weight: 500;">Login</a>
                <a class="btn btn-outline-light rounded-pill px-3" href="/register"
                    style="color: #fff; background-color: #d4af37; border: 1px solid #d4af37; font-weight: 500;">Register</a>
            </div>
        </div>
    </div>
</nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1 class="display-3 fw-bold">Selamat Datang di Citra Wedding</h1>
            <p class="lead fw-bold">Wujudkan momen pernikahan impianmu bersama kami</p>
            <a href="/login" class="btn btn-wedding btn-lg fw-bold">LOGIN</a>
        </div>
    </section>

    <!-- Paket Section -->
    <section id="paket" class="py-5 bg-light text-center">
        <div class="container">
            <h2 class="mb-4">Paket Pernikahan</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Paket Silver</h5>
                            <p class="card-text">Mulai dari Rp10.000.000<br>Elegan & simpel untuk momen intim.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Paket Gold</h5>
                            <p class="card-text">Mulai dari Rp20.000.000<br>Layanan lengkap dengan dokumentasi.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Paket Platinum</h5>
                            <p class="card-text">Mulai dari Rp30.000.000<br>Premium dengan dekorasi eksklusif.</p>
                        </div>
                    </div>
                </div>
            </div>
            <a href="/booking" class="btn btn-wedding mt-3">Booking Sekarang</a>
        </div>
    </section>

    <!-- Tentang Section -->
    <section id="tentang" class="py-5 text-center">
        <div class="container">
            <h2 class="mb-4">Tentang Kami</h2>
            <p>Citra Wedding telah berpengalaman lebih dari 10 tahun dalam menyelenggarakan pernikahan berkesan. Tim
                kami siap membantu Anda dari persiapan hingga hari bahagia.</p>
        </div>
    </section>

    <!-- Testimoni Section -->
    <section id="testimoni" class="py-5 bg-light text-center">
        <div class="container">
            <h2 class="mb-4">Testimoni</h2>
            <blockquote class="blockquote">“Pelayanan Citra Wedding luar biasa! Semua detail diperhatikan, kami sangat
                puas.”<footer class="blockquote-footer">Anisa & Dimas</footer>
            </blockquote>
        </div>
    </section>

    <!-- Kontak Section -->
    <section id="kontak" class="py-5 text-center">
        <div class="container">
            <h2 class="mb-4">Hubungi Kami</h2>
            <p>Email: info@citrawedding.com | Telp: 0812-3456-7890</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 text-center">
        <div class="container">
            &copy; {{ date('Y') }} Citra Wedding Organizer. All rights reserved.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
