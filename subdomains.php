<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subdomain Enumeration - Advanced Web Recon Toolkit</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&family=Fira+Code:wght@400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #0d0d0d;
            color: #eaeaea;
            font-family: 'Fira Code', monospace;
            overflow-x: hidden;
        }

        h1 {
            font-weight: 700;
            color: #00e676;
            font-family: 'Orbitron', sans-serif;
        }

        p, li {
            font-size: 1.1rem;
            color: #b0b0b0;
        }

        .sidebar {
            width: 250px;
            background-color: #101010;
            padding-top: 30px;
            border-right: 2px solid #00e676;
        }

        .sidebar-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.5rem;
            color: #00e676;
        }

        .nav-link {
            color: #b0b0b0;
            font-size: 1.1rem;
        }

        .nav-link:hover, .nav-link.active {
            color: #00e676;
            font-weight: bold;
        }

        .nav-link.disabled {
            color: #8f8fb3;
        }

        .container-fluid {
            margin-left: 100px;
            position: relative;
            z-index: 1;
        }

        .text-gradient-primary {
            background: linear-gradient(90deg, #00e676 0%, #0094ff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .card {
            background-color: #1c1c1c;
            border: none;
            border-radius: 10px;
            box-shadow: 0 15px 30px rgba(0, 230, 118, 0.2);
            min-height: 400px; /* Set minimum height to match WHOIS card */
        }

        .form-control {
            background-color: #2b2b2b;
            color: #eaeaea;
            border: none;
            border-radius: 50px;
            padding: 15px;
        }

        .btn-gradient-primary {
            background-color: #00e676;
            border: none;
            color: #000;
            box-shadow: 0 0 10px rgba(0, 230, 118, 0.5);
            transition: background-color 0.4s ease, transform 0.3s ease;
        }

        .btn-gradient-primary:hover {
            background-color: #00b248;
            transform: scale(1.05);
        }

        .list-group-item {
            background-color: #2b2b2b;
            border: none;
            color: #eaeaea;
        }

        .subdomain-result {
            background-color: #2b2b2b;
            padding: 30px;
            border-radius: 15px;
            color: #eaeaea;
            margin-top: 30px;
            font-size: 1.1rem;
            overflow-x: auto;
        }

        /* Enhancing "Subdomain Data" visibility */
        h4 {
            color: #00e676; /* Change to brighter green */
            font-size: 1.5rem; /* Slightly larger for better visibility */
            margin-top: 30px;
            text-align: left; /* Center the heading */ 
        }

        /* Remove extra space after subdomain result box */
        .card-body {
            padding-bottom: 0 !important; /* Removing bottom padding */
        }

        /* Background pattern */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://www.transparenttextures.com/patterns/circuit-board.png');
            opacity: 0.05;
            z-index: -1; /* Ensure background stays behind content */
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="sidebar text-white vh-100 p-3">
            <h2 class="sidebar-title mb-4">Web Recon Toolkit</h2>
            <ul class="nav flex-column">
                <li class="nav-item mb-3">
                    <a class="nav-link text-white" href="index.php">Home</a> <!-- Check the path -->
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link active text-gradient-primary" href="subdomains.php">Subdomain Enumeration</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link text-white" href="whois_lookup.php">WHOIS Lookup</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link text-white disabled" href="#">DNS Lookup (Coming Soon)</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link text-white disabled" href="#">Port Scanner (Coming Soon)</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link text-white disabled" href="#">SSL Certificate Scanner (Coming Soon)</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link text-white disabled" href="#">Website Fingerprinting (Coming Soon)</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link text-white disabled" href="#">HTTP Header Analyzer (Coming Soon)</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link text-white disabled" href="#">IP Geolocation Finder (Coming Soon)</a>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="container-fluid p-4">
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <h1 class="text-center text-gradient-primary mb-4">Subdomain Enumeration</h1>
                    <form action="subdomain_fetcher.php" method="POST">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="domain" placeholder="Enter Domain (e.g. example.com)" aria-label="Domain" required>
                            <button class="btn btn-gradient-primary" type="submit">Enumerate</button>
                        </div>
                    </form>

                    <!-- Display Subdomains -->
                    <h4>Subdomain Data</h4>
                    <div class="subdomain-result">
                        <?php
                        // This section processes subdomain data fetched by the backend
                        if (isset($_GET['subdomains'])) {
                            $subdomains = explode(',', htmlspecialchars($_GET['subdomains']));
                            if (count($subdomains) > 0) {
                                echo "<ul class='list-group'>";
                                foreach ($subdomains as $subdomain) {
                                    echo "<li class='list-group-item'>$subdomain</li>";
                                }
                                echo "</ul>";
                            } else {
                                echo '<div class="alert alert-info">No subdomains found for the given domain.</div>';
                            }
                        } elseif (isset($_GET['error'])) {
                            echo '<div class="alert alert-danger">' . htmlspecialchars($_GET['error']) . '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

