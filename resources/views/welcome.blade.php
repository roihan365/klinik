<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medilink Healthcare</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- SwiperJS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</head>
<body class="font-sans bg-white">

<!-- Navbar -->
<header class="bg-white text-blue shadow-md">
  <div class="container mx-auto flex items-center justify-between p-3">
    <!-- Logo lebih besar -->
    <div class="flex items-center space-x-2">
      <img src="images/medilink logo.png" alt="Medilink Logo" class="w-28 h-auto">
    </div>
    <!-- Menu -->
    <nav class="hidden md:flex space-x-8 text-blue-900">
      <a href="#" class="hover:text-blue-500">Home</a>
      <a href="#" class="hover:text-blue-500">Clinics</a>
      <a href="#" class="hover:text-blue-500">Doctor</a>
      <a href="#" class="hover:text-blue-500">About Us</a>
    </nav>
    <!-- Button -->
    <a href="{{ route('login') }}" class="btn btn-primary">Book Now</a>
  </div>
</header>

<!-- Hero Section -->
<section class="container mx-auto flex flex-col md:flex-row items-center justify-between py-10 px-4">
  <!-- Text -->
  <div class="max-w-lg">
    <h2 class="text-4xl md:text-5xl font-bold text-blue-900 leading-tight">
      Easy, fast,<br>trusted healthcare.
    </h2>
    <p class="text-gray-600 mt-4">Perawatan hanya dengan satu klik</p>

    <!-- Buttons & Doctors -->
    <div class="flex items-center space-x-4 mt-6">
      <a href="#" class="bg-blue-900 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-800">Book Now</a>
      <div class="flex items-center space-x-2">
        <img src="images/dokter1.jpg" alt="Doctor" class="w-10 h-10 rounded-full">
        <span class="text-gray-700 font-medium">20+ Dokter terbaik</span>
      </div>
    </div>
  </div>

  <!-- Image (Ilustrasi Komputer) -->
  <div class="mt-8 md:mt-0">
    <img src="images/Tampilan.png" alt="Illustration" class="w-full max-w-md">
  </div>
</section>

<!-- Klinik Sering Dikunjungi -->
<section class="bg-white py-12">
  <div class="container mx-auto px-6">

    <h2 class="text-2xl font-bold text-center text--800 mb-8">
      Klinik Sering Dikunjungi
    </h2>

    <!-- Grid Klinik -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
      
      <!-- Card Klinik -->
      <div class="bg-blue-900 rounded-2xl overflow-hidden shadow-lg text-white">
        <img src="images/klinik1.jpg" alt="Klinik 1" class="w-full h-48 object-cover">
        <div class="flex justify-between items-center p-4">
          <h3 class="font-semibold">Klinik Medika</h3>
          <span class="bg-white text-blue-900 w-8 h-8 flex items-center justify-center rounded-full">&rarr;</span>
        </div>
      </div>

      <!-- Card Klinik -->
      <div class="bg-blue-900 rounded-2xl overflow-hidden shadow-lg text-white">
        <img src="images/klinik2.jpg" alt="Klinik 2" class="w-full h-48 object-cover">
        <div class="flex justify-between items-center p-4">
          <h3 class="font-semibold">Klinik Medika</h3>
          <span class="bg-white text-blue-900 w-8 h-8 flex items-center justify-center rounded-full">&rarr;</span>
        </div>
      </div>

      <!-- Card Klinik -->
      <div class="bg-blue-900 rounded-2xl overflow-hidden shadow-lg text-white">
        <img src="images/klinik3.jpg" alt="Klinik 3" class="w-full h-48 object-cover">
        <div class="flex justify-between items-center p-4">
          <h3 class="font-semibold">Klinik Medika</h3>
          <span class="bg-white text-blue-900 w-8 h-8 flex items-center justify-center rounded-full">&rarr;</span>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Dokter Terbaik -->
<section class="bg-blue-900 py-12">
  <div class="container mx-auto px-6">
    <h2 class="text-2xl font-bold text-center text-white mb-8">
      Ada Banyak Pilihan Dokter Terbaik
    </h2>

    <!-- Grid Dokter -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
      
      <!-- Card Dokter -->
      <div class="bg-white rounded-2xl overflow-hidden shadow-lg">
        <img src="images/dokter1.jpg" alt="Dokter X" class="w-full h-56 object-cover">
        <div class="flex justify-between items-center p-4">
          <h3 class="font-semibold text-blue-900">Dokter X</h3>
          <span class="bg-blue-900 text-white w-8 h-8 flex items-center justify-center rounded-full">&rarr;</span>
        </div>
      </div>

      <!-- Card Dokter -->
      <div class="bg-white rounded-2xl overflow-hidden shadow-lg">
        <img src="images/dokter2.jpg" alt="Dokter Y" class="w-full h-56 object-cover">
        <div class="flex justify-between items-center p-4">
          <h3 class="font-semibold text-blue-900">Dokter Y</h3>
          <span class="bg-blue-900 text-white w-8 h-8 flex items-center justify-center rounded-full">&rarr;</span>
        </div>
      </div>

      <!-- Card Dokter -->
      <div class="bg-white rounded-2xl overflow-hidden shadow-lg">
        <img src="images/dokter3.jpg" alt="Dokter Z" class="w-full h-56 object-cover">
        <div class="flex justify-between items-center p-4">
          <h3 class="font-semibold text-blue-900">Dokter Z</h3>
          <span class="bg-blue-900 text-white w-8 h-8 flex items-center justify-center rounded-full">&rarr;</span>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Layanan Unggulan -->
<section class="bg-white py-16">
  <div class="container mx-auto px-6">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-4">
      Layanan Unggulan
    </h2>
    <p class="text-center text-gray-600 mb-10">
      Medilink hadir dengan layanan unggulan yang dirancang untuk menjaga kesehatan Anda 
      dan keluarga secara menyeluruh.
    </p>

    <!-- Grid Layanan -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
      
      <!-- Card Layanan -->
      <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 text-center hover:shadow-lg transition">
        <div class="text-blue-600 text-5xl mb-4">🦷</div>
        <h3 class="font-semibold text-lg text-gray-800 mb-2">Perawatan Gigi & Mulut</h3>
        <p class="text-gray-600 text-sm">
          "Mulai dari pembersihan karang gigi rutin, penambalan, hingga konsultasi untuk perawatan behel, 
          tim dokter gigi profesional kami siap menjaga senyum sehat Anda."
        </p>
      </div>

      <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 text-center hover:shadow-lg transition">
        <div class="text-blue-600 text-5xl mb-4">🧸</div>
        <h3 class="font-semibold text-lg text-gray-800 mb-2">Perawatan Anak</h3>
        <p class="text-gray-600 text-sm">
          "Mulai dari imunisasi rutin, pemeriksaan tumbuh kembang, hingga konsultasi gizi, 
          tim dokter anak kami siap mendampingi buah hati Anda."
        </p>
      </div>

      <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 text-center hover:shadow-lg transition">
        <div class="text-blue-600 text-5xl mb-4">🔍</div>
        <h3 class="font-semibold text-lg text-gray-800 mb-2">Pemeriksaan Umum</h3>
        <p class="text-gray-600 text-sm">
          "Layanan konsultasi kesehatan umum dengan dokter profesional untuk menjaga tubuh tetap sehat dan bugar."
        </p>
      </div>

    </div>
  </div>
</section>

<!-- Apa Kata Mereka -->
<section class="bg-blue-900 py-16">
  <div class="container mx-auto px-6">
    <h2 class="text-2xl font-bold text-center text-white mb-2">
      Apa kata Mereka ?
    </h2>
    <p class="text-center text-blue-200 mb-10">
      Kisah nyata dari mereka yang telah merasakan pelayanan terbaik dari tim kami
    </p>

    <!-- Grid Testimoni -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
      
      <!-- Card Testimoni -->
      <div class="bg-white rounded-2xl overflow-hidden shadow-lg">
        <img src="images/passien1.jpg" alt="Pasien 1" class="w-full h-56 object-cover">
        <div class="p-4">
          <p class="text-gray-700 text-sm italic">
            "Pelayanannya sangat ramah dan dokternya sangat sabar menjelaskan. Saya merasa tenang selama perawatan. 
            Sangat direkomendasikan!"
          </p>
        </div>
      </div>

      <div class="bg-white rounded-2xl overflow-hidden shadow-lg">
        <img src="images/passien2.jpg" alt="Pasien 2" class="w-full h-56 object-cover">
        <div class="p-4">
          <p class="text-gray-700 text-sm italic">
            "Pelayanannya sangat ramah dan dokternya sangat sabar menjelaskan. Saya merasa tenang selama perawatan. 
            Sangat direkomendasikan!"
          </p>
        </div>
      </div>

      <div class="bg-white rounded-2xl overflow-hidden shadow-lg">
        <img src="images/passien3.jpg" alt="Pasien 3" class="w-full h-56 object-cover">
        <div class="p-4">
          <p class="text-gray-700 text-sm italic">
            "Pelayanannya sangat ramah dan dokternya sangat sabar menjelaskan. Saya merasa tenang selama perawatan. 
            Sangat direkomendasikan!"
          </p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Footer -->
<footer style="background-color:#1f4e79; color:white; padding:40px 20px; font-family:Arial, sans-serif;">
  
  <!-- Tambahan Slider Foto -->
  <div class="container mx-auto mb-10">
    <h3 class="text-lg font-semibold mb-4 text-center">Galeri Medilink</h3>
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="images/klinik1.jpg" class="w-full h-48 object-cover rounded-lg" alt="Foto 1"></div>
        <div class="swiper-slide"><img src="images/klinik2.jpg" class="w-full h-48 object-cover rounded-lg" alt="Foto 2"></div>
        <div class="swiper-slide"><img src="images/klinik3.jpg" class="w-full h-48 object-cover rounded-lg" alt="Foto 3"></div>
        <div class="swiper-slide"><img src="images/dokter1.jpg" class="w-full h-48 object-cover rounded-lg" alt="Foto 4"></div>
        <div class="swiper-slide"><img src="images/dokter2.jpg" class="w-full h-48 object-cover rounded-lg" alt="Foto 5"></div>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
  </div>

  <!-- Bagian Footer Lama -->
  <div style="display:grid; grid-template-columns: 1fr 1fr 1fr 1fr; gap:20px; text-align:left;">

    <!-- Follow -->
    <div>
      <h3 style="margin-bottom:10px;">Follow</h3>
      <p style="font-size:14px; line-height:1.6;">
        We are committed to providing trusted healthcare solutions 
        and making medical services more accessible.
      </p>
      <div style="margin-top:15px;">
        <a href="#" style="margin-right:10px; color:white; font-size:18px;">🌐</a>
        <a href="#" style="margin-right:10px; color:white; font-size:18px;">🐦</a>
        <a href="#" style="margin-right:10px; color:white; font-size:18px;">📸</a>
        <a href="#" style="margin-right:10px; color:white; font-size:18px;">▶️</a>
      </div>
    </div>

    <!-- Links -->
    <div>
      <h3 style="margin-bottom:10px;">Links</h3>
      <ul style="list-style:none; padding:0; font-size:14px;">
        <li><a href="#" style="color:white; text-decoration:none;">Home</a></li>
        <li><a href="#" style="color:white; text-decoration:none;">Services</a></li>
        <li><a href="#" style="color:white; text-decoration:none;">Blog</a></li>
        <li><a href="#" style="color:white; text-decoration:none;">Contact Us</a></li>
      </ul>
    </div>

    <!-- Services -->
    <div>
      <h3 style="margin-bottom:10px;">Services</h3>
      <ul style="list-style:none; padding:0; font-size:14px;">
        <li><a href="#" style="color:white; text-decoration:none;">Appointment Booking</a></li>
        <li><a href="#" style="color:white; text-decoration:none;">Medical Consultation</a></li>
        <li><a href="#" style="color:white; text-decoration:none;">Health Packages</a></li>
        <li><a href="#" style="color:white; text-decoration:none;">Trade Program</a></li>
      </ul>
    </div>

    <!-- Contact -->
    <div>
      <h3 style="margin-bottom:10px;">Official Info</h3>
      <p style="font-size:14px;">📍 30 Commercial Road, Fratton, Australia</p>
      <p style="font-size:14px;">📞 +123456789012</p>
    </div>
  </div>

  <hr style="border:0; border-top:1px solid #ffffff44; margin:20px 0;">

  <p style="text-align:center; font-size:13px; margin:0;">
    Copyright © 2024 - <b>MEDILINK</b>
  </p>
</footer>

<!-- Init Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 20,
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      640: { slidesPerView: 2 },
      1024: { slidesPerView: 3 }
    }
  });
</script>

</body>
</html>
