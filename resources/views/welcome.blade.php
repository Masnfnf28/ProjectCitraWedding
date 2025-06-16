<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Citra Wedding Organizer</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Open+Sans&display=swap"
        rel="stylesheet">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet @1.9.4/dist/leaflet.css" />
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet @1.9.4/dist/leaflet.js"></script>

    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }

        .font-playfair {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>

<body class="bg-[#fff8f4] text-gray-700 scroll-smooth">

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 w-full z-50 bg-white shadow-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="#" class="font-playfair text-2xl text-rose-500 font-bold">Citra Wedding</a>
            <div class="hidden md:flex gap-6 text-sm font-medium">
                <a href="#tentang" class="hover:text-rose-500 transition">About</a>
                <a href="#paket" class="hover:text-rose-500 transition">Paket</a>
                <a href="#testimoni" class="hover:text-rose-500 transition">Testimoni</a>
                <a href="#kontak" class="hover:text-rose-500 transition">Kontak</a>
            </div>
            <div class="hidden md:flex gap-2">
                <a href="/login"
                    class="bg-rose-500 hover:bg-rose-600 text-white px-4 py-2 rounded-full text-sm transition">Login</a>
                {{-- <a href="/register"
                    class="border border-rose-500 text-rose-500 hover:bg-rose-500 hover:text-white px-4 py-2 rounded-full text-sm transition">Register</a> --}}
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="h-screen flex items-center justify-center text-center relative bg-cover bg-center"
        style="background-image: url('https://images.unsplash.com/photo-1520340356584-5c89c1dbf63a?auto=format&fit=crop&w=2070&q=80');">
        <div class="absolute inset-0 bg-rose-900 bg-opacity-40"></div>
        <div class="relative z-10 p-6 md:p-12 bg-white bg-opacity-80 rounded-lg shadow-xl max-w-xl">
            <h1 class="font-playfair text-4xl md:text-5xl text-rose-700 mb-4">Selamat Datang di Citra Wedding Organizer
            </h1>
            <p class="text-lg md:text-xl font-medium mb-6 text-gray-800">Wujudkan momen pernikahan impianmu bersama
                kami.</p>
            <a href="/login"
                class="bg-rose-500 hover:bg-rose-600 text-white px-6 py-3 rounded-full shadow transition">Mulai
                Sekarang</a>
        </div>
    </section>

    <!-- Tentang -->
    <section id="tentang" class="py-20 bg-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-playfair text-rose-700 mb-6">Tentang Kami</h2>
            <p class="max-w-3xl mx-auto text-lg text-gray-700 leading-relaxed">
                Citra Wedding Organizer telah menemani lebih dari <strong>500 pasangan</strong> sejak 2010.
                Kami siap menyulap hari bahagia Anda menjadi momen yang tak terlupakan — mulai dari dekorasi,
                dokumentasi, hingga penyusunan acara secara profesional.
            </p>
        </div>
    </section>

    <!-- Paket Section -->
    <section id="paket" class="py-20 bg-[#fff1f2]">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-playfair text-rose-700 mb-10">Paket Pernikahan</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition">
                    <h3 class="text-xl font-bold text-rose-600 mb-2">Paket Silver</h3>
                    <p>Rp10.000.000</p>
                    <p class="text-sm text-gray-600 mt-2">Elegan & simpel untuk momen intim.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition border-2 border-rose-300">
                    <h3 class="text-xl font-bold text-rose-600 mb-2">Paket Gold</h3>
                    <p>Rp20.000.000</p>
                    <p class="text-sm text-gray-600 mt-2">Layanan lengkap dengan dokumentasi profesional.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition">
                    <h3 class="text-xl font-bold text-rose-600 mb-2">Paket Platinum</h3>
                    <p>Rp30.000.000</p>
                    <p class="text-sm text-gray-600 mt-2">Premium dengan dekorasi & venue eksklusif.</p>
                </div>
            </div>
            <div class="mt-8">
                <a href="/booking"
                    class="bg-rose-500 hover:bg-rose-600 text-white px-8 py-3 rounded-full shadow transition">Booking
                    Sekarang</a>
            </div>
        </div>
    </section>

    <!-- Testimoni -->
    <section id="testimoni" class="py-20 bg-[#ffffff]">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-playfair text-rose-700 mb-10">Testimoni</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <!-- Card 1 -->
                <div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-lg transition">
                    <blockquote class="text-lg italic text-gray-800 mb-4">
                        “Pelayanan Citra Wedding luar biasa! Semua detail diperhatikan, hasilnya sangat memuaskan dan
                        sesuai impian.”
                    </blockquote>
                    <footer class="text-sm text-rose-600 font-semibold">— Anisa & Taufik</footer>
                </div>

                <!-- Card 2 -->
                <div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-lg transition">
                    <blockquote class="text-lg italic text-gray-800 mb-4">
                        “Timnya sangat profesional dan ramah. Acara pernikahan kami berjalan lancar tanpa kendala.
                        Terima kasih banyak!”
                    </blockquote>
                    <footer class="text-sm text-rose-600 font-semibold">— Rina & Budi</footer>
                </div>

                <!-- Card 3 -->
                <div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-lg transition">
                    <blockquote class="text-lg italic text-gray-800 mb-4">
                        “Dekorasi dan makeup-nya sangat memukau. Semua keluarga dan tamu memuji konsepnya. Highly
                        recommended!”
                    </blockquote>
                    <footer class="text-sm text-rose-600 font-semibold">— Sari & Doni</footer>
                </div>
            </div>
        </div>
    </section>

    {{-- MAPS --}}
    <!-- Maps -->
    <section class="py-10 bg-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-2xl font-playfair text-rose-700 mb-4">Lokasi Kami</h2>
            <div class="w-full h-[450px] rounded-xl overflow-hidden shadow-lg">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1476.654041042439!2d108.24005011358507!3d-7.300726296525593!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f5b6a744476ad%3A0xff638ff99a7ab194!2sCITRA%20WEDDING!5e0!3m2!1sid!2sid!4v1748365552758!5m2!1sid!2sid"
                    width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>


    <!-- Kontak -->
    <section id="kontak" class="py-20 bg-[#fff1f2]">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-playfair text-rose-700 mb-6">Hubungi Kami</h2>
            <p class="text-lg mb-2">📧 Email: <a href="mailto:info@citrawedding.com"
                    class="text-rose-500 hover:underline">info@citrawedding.com</a></p>
            <p class="text-lg">📞 Telp: <a href="tel:083827148222"
                    class="text-rose-500 hover:underline">0838-2714-8222</a></p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-rose-600 text-white text-center py-6">
        <div class="container mx-auto px-6">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script> Citra Wedding Organizer. All rights reserved.
        </div>
    </footer>

</body>

</html>
