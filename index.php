<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Web Recon Toolkit</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Global Styling */
        body {
            background-color: #0d0d0d;
            color: #eaeaea;
            font-family: 'Fira Code', monospace;
            overflow-x: hidden;
        }

        h1, h4 {
            font-weight: 700;
            color: #00e676;
            font-family: 'Orbitron', sans-serif;
        }

        p {
            font-size: 1.1rem;
            color: #b0b0b0;
        }

        .navbar {
            background-color: #101010;
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 15px 30px;
            border-bottom: 2px solid #00e676;
        }

        .navbar h1 {
            font-size: 2rem;
            color: #00e676;
        }

        .container {
            margin-top: 5%;
        }

        .card {
            background-color: #1c1c1c;
            border: none;
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 230, 118, 0.2);
        }

        .card-title {
            font-weight: 500;
            color: #00e676;
        }

        .card-text {
            color: #9a9a9a;
        }

        .btn {
            font-weight: 500;
            padding: 12px 30px;
            border-radius: 50px;
            transition: background-color 0.4s ease, box-shadow 0.3s ease, transform 0.3s ease;
        }

        .btn-primary {
            background-color: #00e676;
            border: none;
            color: #000;
            box-shadow: 0 0 10px rgba(0, 230, 118, 0.5);
        }

        .btn-primary:hover {
            background-color: #00b248;
            transform: scale(1.08);
            box-shadow: 0 8px 25px rgba(0, 230, 118, 0.4);
        }

        .btn-lg {
            padding: 14px 40px;
            font-size: 1.1rem;
        }

        .disabled {
            background-color: #4e4e6a;
            color: #8f8fb3;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #101010;
            color: #b0b0b0;
            margin-top: 40px;
            font-size: 0.9rem;
            border-top: 2px solid #00e676;
        }

        /* Icons and Card Styling */
        .card i {
            font-size: 48px;
            color: #00e676;
            margin-bottom: 20px;
        }

        /* Card Body Padding */
        .card-body {
            padding: 40px 25px;
        }

        /* Adding subtle background effects */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://www.transparenttextures.com/patterns/circuit-board.png');
            opacity: 0.05;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #00e676;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <h1>Advanced Web Recon Toolkit - by CODELIVLY</h1>
    </nav>

    <div class="container">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <h1 class="mb-4">Advanced Web Recon Toolkit</h1>
                <p>A powerful toolkit designed for cybersecurity professionals to perform recon activities like Subdomain Enumeration, WHOIS Lookup, and more.</p>
                <!-- Source Code Download Link -->
                <div class="text-center mt-3">
                    <a href="download/source_code.zip" class="btn btn-primary btn-lg">Download Source Code</a>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-2 g-4 mt-5">
            <!-- Subdomain Enumeration Section -->
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-sitemap"></i>
                        <h4 class="card-title">Subdomain Enumeration</h4>
                        <p class="card-text">Scan and list subdomains for any target domain.</p>
                        <a href="subdomains.php" class="btn btn-primary">Start Subdomain Scan</a>
                    </div>
                </div>
            </div>

            <!-- WHOIS Lookup Section -->
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-globe"></i>
                        <h4 class="card-title">WHOIS Lookup</h4>
                        <p class="card-text">Get WHOIS information for any domain quickly.</p>
                        <a href="whois_lookup.php" class="btn btn-primary">Start WHOIS Lookup</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-2 g-4 mt-4">
            <!-- DNS Lookup (Coming Soon) -->
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-search"></i>
                        <h4 class="card-title">DNS Lookup (Coming Soon)</h4>
                        <p class="card-text">Perform advanced DNS lookups (coming soon).</p>
                        <a href="#" class="btn btn-primary disabled">Coming Soon</a>
                    </div>
                </div>
            </div>

            <!-- Port Scanner (Coming Soon) -->
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-network-wired"></i>
                        <h4 class="card-title">Port Scanner (Coming Soon)</h4>
                        <p class="card-text">Scan open ports on any IP (coming soon).</p>
                        <a href="#" class="btn btn-primary disabled">Coming Soon</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-2 g-4 mt-4">
            <!-- SSL Certificate Scanner (Coming Soon) -->
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-shield-alt"></i>
                        <h4 class="card-title">SSL Certificate Scanner (Coming Soon)</h4>
                        <p class="card-text">Check the validity and details of SSL certificates.</p>
                        <a href="#" class="btn btn-primary disabled">Coming Soon</a>
                    </div>
                </div>
            </div>

            <!-- Website Fingerprinting (Coming Soon) -->
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-fingerprint"></i>
                        <h4 class="card-title">Website Fingerprinting (Coming Soon)</h4>
                        <p class="card-text">Identify technologies used on a target website.</p>
                        <a href="#" class="btn btn-primary disabled">Coming Soon</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-2 g-4 mt-4">
            <!-- HTTP Header Analyzer (Coming Soon) -->
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-file-code"></i>
                        <h4 class="card-title">HTTP Header Analyzer (Coming Soon)</h4>
                        <p class="card-text">Inspect HTTP headers for vulnerabilities.</p>
                        <a href="#" class="btn btn-primary disabled">Coming Soon</a>
                    </div>
                </div>
            </div>

            <!-- IP Geolocation Finder (Coming Soon) -->
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-map-marker-alt"></i>
                        <h4 class="card-title">IP Geolocation Finder (Coming Soon)</h4>
                        <p class="card-text">Locate the geolocation of any IP address.</p>
                        <a href="#" class="btn btn-primary disabled">Coming Soon</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        &copy; 2024 Advanced Web Recon Toolkit | Made for cybersecurity enthusiasts
    </footer>

    <!-- Bootstrap JS and FontAwesome Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
