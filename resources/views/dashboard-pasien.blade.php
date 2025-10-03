<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pasien - Medilink</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        .sidebar {
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        .main-content {
            margin-left: 16.66666667%; /* Offset for fixed sidebar */
            padding: 20px;
        }

        .nav-link {
            border-radius: 0;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background-color: #f8f9fa;
            transform: translateX(5px);
        }

        .nav-link.active {
            background-color: #e3f2fd;
            border-left: 4px solid #007bff;
        }

        .clinic-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #e0e0e0;
        }

        .clinic-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 20px rgba(0, 123, 255, 0.15);
        }

        .clinic-image {
            object-fit: cover;
            border-radius: 0.375rem 0 0 0.375rem;
            width: 100%;
            height: 200px; /* Fixed height untuk konsistensi */
            transition: transform 0.3s ease, filter 0.3s ease;
            cursor: pointer;
        }

        .clinic-image:hover {
            transform: scale(1.05);
            filter: brightness(1.1);
        }

        /* Image container untuk aspect ratio yang konsisten */
        .clinic-image-container {
            height: 200px;
            overflow: hidden;
            border-radius: 0.375rem 0 0 0.375rem;
            position: relative;
        }

        /* Overlay untuk interaksi */
        .clinic-image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 123, 255, 0.8);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            border-radius: 0.375rem 0 0 0.375rem;
        }

        .clinic-image-container:hover .clinic-image-overlay {
            opacity: 1;
        }

        /* Konsistensi card height */
        .clinic-card {
            height: 200px; /* Fixed height untuk semua card */
        }

        .clinic-card .card-body {
            padding: 1rem;
        }

        .object-cover {
            object-fit: cover;
        }

        .book-appointment {
            transition: all 0.3s ease;
        }

        .book-appointment:hover {
            transform: translateY(-1px);
        }

        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                min-height: auto;
            }
            
            .main-content {
                margin-left: 0;
            }
        }

        .input-group-text {
            border-right: 0;
        }

        .form-control {
            border-left: 0;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
            border-color: #86b7fe;
        }

        .header {
            border-bottom: 1px solid #e0e0e0;
        }

        /* Profile Photo Styles */
        .profile-photo-container {
            position: relative;
        }

        .profile-photo {
            border: 2px solid #007bff;
            transition: all 0.3s ease;
        }

        .profile-photo:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
        }

        .profile-photo-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 40px;
            height: 40px;
            background: rgba(0, 123, 255, 0.8);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .profile-photo-container:hover .profile-photo-overlay {
            opacity: 1;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-light">
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="bg-white shadow-sm col-md-3 col-lg-2 sidebar">
            <div class="p-3 sidebar-brand">
                <!-- HANYA LOGO GAMBAR - Tanpa teks apapun -->
                <div class="text-center w-100">
                    <img src="{{ asset('images/Logo Medilink.png') }}" alt="Medilink Logo" height="50" class="img-fluid">
                </div>

<!-- Image Viewer Modal -->
<div class="modal fade" id="imageViewerModal" tabindex="-1" aria-labelledby="imageViewerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageViewerModalLabel">Detail Klinik</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="text-center modal-body">
                <img id="modalImage" src="" alt="Clinic Image" class="rounded img-fluid" style="max-height: 400px;">
            </div>
        </div>
    </div>
</div>
            </div>
            
            <nav class="nav flex-column">
                <a class="px-3 py-3 nav-link active d-flex align-items-center" href="#beranda">
                    <i class="fas fa-home me-3 text-primary"></i>
                    <span class="fw-semibold text-primary">BERANDA</span>
                </a>
                <a class="px-3 py-3 nav-link d-flex align-items-center" href="#booking">
                    <i class="fas fa-calendar-check me-3 text-muted"></i>
                    <span class="text-muted">BOOKING</span>
                </a>
                <a class="px-3 py-3 nav-link d-flex align-items-center" href="#payment">
                    <i class="fas fa-credit-card me-3 text-muted"></i>
                    <span class="text-muted">PAYMENT</span>
                </a>
                <a class="px-3 py-3 nav-link d-flex align-items-center" href="#riwayat">
                    <i class="fas fa-history me-3 text-muted"></i>
                    <span class="text-muted">RIWAYAT</span>
                </a>
                <a class="px-3 py-3 nav-link d-flex align-items-center" href="#notifikasi">
                    <i class="fas fa-bell me-3 text-muted"></i>
                    <span class="text-muted">NOTIFIKASI</span>
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 col-lg-10 main-content">
            <!-- Header -->
            <div class="p-3 mb-4 bg-white shadow-sm header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="mb-0">Cari Klinik Terdekat & Buat Janji dengan Mudah</h4>
                    </div>
                    <div class="col-auto">
                        <div class="d-flex align-items-center">
                            <span class="me-3">Welcome, <strong>Patient</strong></span>
                            
                            <!-- FOTO PROFIL YANG BISA DIUPLOAD -->
                            <div class="dropdown">
                                <button class="p-0 border-0 btn" type="button" data-bs-toggle="dropdown">
                                    <div class="profile-photo-container position-relative">
                                        <!-- Foto profil atau avatar default -->
                                        <img id="profilePhoto" 
                                             src="{{ asset('images/23302014_Nur Rizka Zahra.jpg') }}" 
                                             alt="Profile Photo" 
                                             class="rounded-circle profile-photo" 
                                             width="40" height="40" 
                                             style="object-fit: cover; cursor: pointer;">
                                        
                                        <!-- Overlay untuk upload -->
                                        <div class="profile-photo-overlay rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="text-white fas fa-camera" style="font-size: 12px;"></i>
                                        </div>
                                    </div>
                                </button>
                                
                                <!-- Dropdown menu untuk profil -->
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#" id="uploadPhotoBtn">
                                            <i class="fas fa-camera me-2"></i>Upload Foto
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#" id="removePhotoBtn">
                                            <i class="fas fa-trash me-2"></i>Hapus Foto
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#profile"><i class="fas fa-user me-2"></i>Profil Saya</a></li>
                                    <li><a class="dropdown-item" href="#settings"><i class="fas fa-cog me-2"></i>Pengaturan</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-danger" href="#logout"><i class="fas fa-sign-out-alt me-2"></i>Keluar</a></li>
                                </ul>
                            </div>
                            
                            <!-- Hidden file input untuk upload -->
                            <input type="file" id="photoUpload" accept="image/*" style="display: none;">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search Section -->
            <div class="mb-4 search-section">
                <form id="searchForm" class="row g-3">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="bg-white input-group-text">
                                <i class="fas fa-map-marker-alt text-muted"></i>
                            </span>
                            <input type="text" class="form-control" id="locationInput" placeholder="Lokasi" value="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="bg-white input-group-text">
                                <i class="fas fa-hospital text-muted"></i>
                            </span>
                            <input type="text" class="form-control" id="clinicInput" placeholder="Klinik" value="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-search me-2"></i>
                            Search
                        </button>
                    </div>
                </form>
            </div>

            <!-- Clinic Results -->
            <div class="clinic-results">
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <span class="text-muted">ditemukan <strong id="clinicCount">15</strong> klinik</span>
                    <button class="btn btn-outline-primary btn-sm" id="viewAllBtn">
                        <i class="fas fa-th me-1"></i>
                        Semua Klinik
                    </button>
                </div>

                <div class="row" id="clinicList">
                    <!-- Clinic Card 1 -->
                    <div class="mb-3 col-md-6">
                        <div class="shadow-sm card clinic-card h-100">
                            <div class="row g-0 h-100">
                                <div class="col-md-6">
                                    <!-- FOTO KLINIK 1 dengan container dan overlay -->
                                    <div class="clinic-image-container">
                                        <img src="{{ asset('images/klinik-1.jpg') }}" 
                                             class="clinic-image" 
                                             alt="Klinik Medika Jaya"
                                             onclick="viewClinicImage('{{ asset('images/klinik-1.jpg') }}', 'Klinik Medika Jaya')">
                                        <div class="clinic-image-overlay">
                                            <div class="text-center">
                                                <i class="mb-2 fas fa-eye" style="font-size: 1.5rem;"></i>
                                                <div style="font-size: 0.9rem;">Lihat Detail</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body d-flex flex-column h-100">
                                        <h6 class="mb-2 card-title fw-bold text-primary">Klinik Medika Jaya</h6>
                                        <div class="mb-2 clinic-info flex-grow-1">
                                            <small class="mb-1 text-muted d-flex align-items-center">
                                                <i class="fas fa-phone me-2"></i>
                                                +62-2384-163
                                            </small>
                                            <small class="text-muted d-flex align-items-center">
                                                <i class="fas fa-map-marker-alt me-2"></i>
                                                Serta Baik, Jakarta Selatan
                                            </small>
                                        </div>
                                        <div class="mt-auto">
                                            <button class="btn btn-primary btn-sm w-100 book-appointment" 
                                                    data-clinic="Klinik Medika Jaya">
                                                <i class="fas fa-calendar-plus me-1"></i>
                                                Buat Janji
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Clinic Card 2 -->
                    <div class="mb-3 col-md-6">
                        <div class="shadow-sm card clinic-card h-100">
                            <div class="row g-0 h-100">
                                <div class="col-md-6">
                                    <!-- FOTO KLINIK 2 dengan container dan overlay -->
                                    <div class="clinic-image-container">
                                        <img src="{{ asset('images/klinik-2.jpg') }}" 
                                             class="clinic-image" 
                                             alt="Klinik Umum dr. Amanda"
                                             onclick="viewClinicImage('{{ asset('images/klinik-2.jpg') }}', 'Klinik Umum dr. Amanda')">
                                        <div class="clinic-image-overlay">
                                            <div class="text-center">
                                                <i class="mb-2 fas fa-eye" style="font-size: 1.5rem;"></i>
                                                <div style="font-size: 0.9rem;">Lihat Detail</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body d-flex flex-column h-100">
                                        <h6 class="mb-2 card-title fw-bold text-primary">Klinik Umum dr. Amanda</h6>
                                        <div class="mb-2 clinic-info flex-grow-1">
                                            <small class="mb-1 text-muted d-flex align-items-center">
                                                <i class="fas fa-phone me-2"></i>
                                                +62-2384-121
                                            </small>
                                            <small class="text-muted d-flex align-items-center">
                                                <i class="fas fa-map-marker-alt me-2"></i>
                                                Serta Baik, Jakarta Selatan
                                            </small>
                                        </div>
                                        <div class="mt-auto">
                                            <button class="btn btn-primary btn-sm w-100 book-appointment" 
                                                    data-clinic="Klinik Umum dr. Amanda">
                                                <i class="fas fa-calendar-plus me-1"></i>
                                                Buat Janji
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Clinic Cards -->
                    <div class="mb-3 col-md-6">
                        <div class="shadow-sm card clinic-card h-100">
                            <div class="row g-0 h-100">
                                <div class="col-md-6">
                                    <!-- FOTO KLINIK 3 dengan container dan overlay -->
                                    <div class="clinic-image-container">
                                        <img src="{{ asset('images/klinik-3.jpg') }}" 
                                             class="clinic-image" 
                                             alt="Klinik Sehat Prima"
                                             onclick="viewClinicImage('{{ asset('images/klinik-3.jpg') }}', 'Klinik Sehat Prima')">
                                        <div class="clinic-image-overlay">
                                            <div class="text-center">
                                                <i class="mb-2 fas fa-eye" style="font-size: 1.5rem;"></i>
                                                <div style="font-size: 0.9rem;">Lihat Detail</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body d-flex flex-column h-100">
                                        <h6 class="mb-2 card-title fw-bold text-primary">Klinik Sehat Prima</h6>
                                        <div class="mb-2 clinic-info flex-grow-1">
                                            <small class="mb-1 text-muted d-flex align-items-center">
                                                <i class="fas fa-phone me-2"></i>
                                                +62-2384-456
                                            </small>
                                            <small class="text-muted d-flex align-items-center">
                                                <i class="fas fa-map-marker-alt me-2"></i>
                                                Kebayoran, Jakarta Selatan
                                            </small>
                                        </div>
                                        <div class="mt-auto">
                                            <button class="btn btn-primary btn-sm w-100 book-appointment" 
                                                    data-clinic="Klinik Sehat Prima">
                                                <i class="fas fa-calendar-plus me-1"></i>
                                                Buat Janji
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 col-md-6">
                        <div class="shadow-sm card clinic-card h-100">
                            <div class="row g-0 h-100">
                                <div class="col-md-6">
                                    <!-- FOTO KLINIK 4 dengan container dan overlay -->
                                    <div class="clinic-image-container">
                                        <img src="{{ asset('images/klinik-4.jpg') }}" 
                                             class="clinic-image" 
                                             alt="Medical Center Harapan"
                                             onclick="viewClinicImage('{{ asset('images/klinik-4.jpg') }}', 'Medical Center Harapan')">
                                        <div class="clinic-image-overlay">
                                            <div class="text-center">
                                                <i class="mb-2 fas fa-eye" style="font-size: 1.5rem;"></i>
                                                <div style="font-size: 0.9rem;">Lihat Detail</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body d-flex flex-column h-100">
                                        <h6 class="mb-2 card-title fw-bold text-primary">Medical Center Harapan</h6>
                                        <div class="mb-2 clinic-info flex-grow-1">
                                            <small class="mb-1 text-muted d-flex align-items-center">
                                                <i class="fas fa-phone me-2"></i>
                                                +62-2384-789
                                            </small>
                                            <small class="text-muted d-flex align-items-center">
                                                <i class="fas fa-map-marker-alt me-2"></i>
                                                Senayan, Jakarta Pusat
                                            </small>
                                        </div>
                                        <div class="mt-auto">
                                            <button class="btn btn-primary btn-sm w-100 book-appointment" 
                                                    data-clinic="Medical Center Harapan">
                                                <i class="fas fa-calendar-plus me-1"></i>
                                                Buat Janji
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Booking Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingModalLabel">Buat Janji Temu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="appointmentForm">
                    <div class="mb-3">
                        <label for="selectedClinic" class="form-label">Klinik Terpilih</label>
                        <input type="text" class="form-control" id="selectedClinic" readonly>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="appointmentDate" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="appointmentDate" required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="appointmentTime" class="form-label">Waktu</label>
                            <select class="form-select" id="appointmentTime" required>
                                <option value="">Pilih Waktu</option>
                                <option value="08:00">08:00</option>
                                <option value="09:00">09:00</option>
                                <option value="10:00">10:00</option>
                                <option value="11:00">11:00</option>
                                <option value="13:00">13:00</option>
                                <option value="14:00">14:00</option>
                                <option value="15:00">15:00</option>
                                <option value="16:00">16:00</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="patientName" class="form-label">Nama Pasien</label>
                        <input type="text" class="form-control" id="patientName" required>
                    </div>
                    <div class="mb-3">
                        <label for="complaint" class="form-label">Keluhan</label>
                        <textarea class="form-control" id="complaint" rows="3" placeholder="Jelaskan keluhan Anda..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="confirmBooking">Konfirmasi Janji</button>
            </div>
        </div>
    </div>
</div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Search functionality
        const searchForm = document.getElementById('searchForm');
        const locationInput = document.getElementById('locationInput');
        const clinicInput = document.getElementById('clinicInput');
        const clinicList = document.getElementById('clinicList');
        const clinicCount = document.getElementById('clinicCount');

        // Handle search form submission
        searchForm.addEventListener('submit', function(e) {
            e.preventDefault();
            performSearch();
        });

        // Real-time search as user types
        locationInput.addEventListener('input', debounce(performSearch, 500));
        clinicInput.addEventListener('input', debounce(performSearch, 500));

        function performSearch() {
            const location = locationInput.value.toLowerCase();
            const clinic = clinicInput.value.toLowerCase();
            const clinicCards = clinicList.querySelectorAll('.col-md-6');
            let visibleCount = 0;

            clinicCards.forEach(card => {
                const clinicName = card.querySelector('.card-title').textContent.toLowerCase();
                const clinicLocation = card.querySelector('.fa-map-marker-alt').parentElement.textContent.toLowerCase();
                
                const matchesLocation = location === '' || clinicLocation.includes(location);
                const matchesClinic = clinic === '' || clinicName.includes(clinic);
                
                if (matchesLocation && matchesClinic) {
                    card.style.display = 'block';
                    visibleCount++;
                    // Add animation
                    card.style.animation = 'fadeIn 0.5s ease-in';
                } else {
                    card.style.display = 'none';
                }
            });

            clinicCount.textContent = visibleCount;
            
            // Show "no results" message if no clinics found
            if (visibleCount === 0) {
                showNoResultsMessage();
            } else {
                hideNoResultsMessage();
            }
        }

        // Booking functionality
        const bookingModal = new bootstrap.Modal(document.getElementById('bookingModal'));
        const bookingButtons = document.querySelectorAll('.book-appointment');
        const selectedClinicInput = document.getElementById('selectedClinic');
        const confirmBookingBtn = document.getElementById('confirmBooking');

        bookingButtons.forEach(button => {
            button.addEventListener('click', function() {
                const clinicName = this.getAttribute('data-clinic');
                selectedClinicInput.value = clinicName;
                bookingModal.show();
                
                // Set minimum date to today
                const today = new Date().toISOString().split('T')[0];
                document.getElementById('appointmentDate').setAttribute('min', today);
            });
        });

        // Handle booking confirmation
        confirmBookingBtn.addEventListener('click', function() {
            const form = document.getElementById('appointmentForm');
            if (form.checkValidity()) {
                // Simulate booking process
                showLoadingState(this);
                
                setTimeout(() => {
                    hideLoadingState(this);
                    bookingModal.hide();
                    showSuccessAlert();
                    form.reset();
                }, 2000);
            } else {
                form.reportValidity();
            }
        });

        // Navigation functionality
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all links
                navLinks.forEach(l => l.classList.remove('active'));
                
                // Add active class to clicked link
                this.classList.add('active');
                
                // Update text colors
                navLinks.forEach(l => {
                    const icon = l.querySelector('i');
                    const span = l.querySelector('span');
                    if (l.classList.contains('active')) {
                        icon.classList.remove('text-muted');
                        icon.classList.add('text-primary');
                        span.classList.remove('text-muted');
                        span.classList.add('text-primary');
                    } else {
                        icon.classList.remove('text-primary');
                        icon.classList.add('text-muted');
                        span.classList.remove('text-primary');
                        span.classList.add('text-muted');
                    }
                });
            });
        });

        // View all clinics button
        document.getElementById('viewAllBtn').addEventListener('click', function() {
            locationInput.value = '';
            clinicInput.value = '';
            performSearch();
            
            // Add visual feedback
            this.innerHTML = '<i class="fas fa-check me-1"></i>Menampilkan Semua';
            setTimeout(() => {
                this.innerHTML = '<i class="fas fa-th me-1"></i>Semua Klinik';
            }, 1500);
        });

        // Utility functions
        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }

        function showLoadingState(button) {
            button.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status"></span>Memproses...';
            button.disabled = true;
        }

        function hideLoadingState(button) {
            button.innerHTML = 'Konfirmasi Janji';
            button.disabled = false;
        }

        function showSuccessAlert() {
            const alertDiv = document.createElement('div');
            alertDiv.className = 'alert alert-success alert-dismissible fade show position-fixed';
            alertDiv.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
            alertDiv.innerHTML = `
                <i class="fas fa-check-circle me-2"></i>
                Janji temu berhasil dibuat!
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            document.body.appendChild(alertDiv);
            
            setTimeout(() => {
                alertDiv.remove();
            }, 5000);
        }

        function showNoResultsMessage() {
            if (!document.getElementById('noResultsMessage')) {
                const noResultsDiv = document.createElement('div');
                noResultsDiv.id = 'noResultsMessage';
                noResultsDiv.className = 'text-center py-5';
                noResultsDiv.innerHTML = `
                    <i class="mb-3 fas fa-search text-muted" style="font-size: 3rem;"></i>
                    <h5 class="text-muted">Tidak ada klinik yang ditemukan</h5>
                    <p class="text-muted">Coba ubah kata kunci pencarian Anda</p>
                `;
                clinicList.appendChild(noResultsDiv);
            }
        }

        function hideNoResultsMessage() {
            const noResultsMessage = document.getElementById('noResultsMessage');
            if (noResultsMessage) {
                noResultsMessage.remove();
            }
        }

        // Profile Photo Upload functionality
        const profilePhoto = document.getElementById('profilePhoto');
        const photoUpload = document.getElementById('photoUpload');
        const uploadPhotoBtn = document.getElementById('uploadPhotoBtn');
        const removePhotoBtn = document.getElementById('removePhotoBtn');
        const defaultAvatarPath = "{{ asset('images/default-avatar.png') }}";

        // Load saved photo from localStorage on page load
        const savedPhoto = localStorage.getItem('profilePhoto');
        if (savedPhoto) {
            profilePhoto.src = savedPhoto;
        }

        // Click upload photo button
        uploadPhotoBtn.addEventListener('click', function(e) {
            e.preventDefault();
            photoUpload.click();
        });

        // Handle file selection
        photoUpload.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                // Validate file type
                if (!file.type.match('image.*')) {
                    showAlert('Hanya file gambar yang diperbolehkan!', 'danger');
                    return;
                }

                // Validate file size (max 2MB)
                if (file.size > 2 * 1024 * 1024) {
                    showAlert('Ukuran file maksimal 2MB!', 'danger');
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    const imageData = e.target.result;
                    
                    // Update profile photo
                    profilePhoto.src = imageData;
                    
                    // Save to localStorage (in real app, save to server)
                    localStorage.setItem('profilePhoto', imageData);
                    
                    showAlert('Foto profil berhasil diupload!', 'success');
                };
                reader.readAsDataURL(file);
            }
        });

        // Remove photo button
        removePhotoBtn.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Reset to default avatar
            profilePhoto.src = defaultAvatarPath;
            
            // Remove from localStorage
            localStorage.removeItem('profilePhoto');
            
            // Reset file input
            photoUpload.value = '';
            
            showAlert('Foto profil berhasil dihapus!', 'success');
        });

        // Direct click on photo to upload
        profilePhoto.addEventListener('click', function() {
            photoUpload.click();
        });

        function showAlert(message, type) {
            const alertDiv = document.createElement('div');
            alertDiv.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
            alertDiv.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
            alertDiv.innerHTML = `
                <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-triangle'} me-2"></i>
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            document.body.appendChild(alertDiv);
            
            setTimeout(() => {
                alertDiv.remove();
            }, 4000);
        }
    });
    </script>
</body>
</html>