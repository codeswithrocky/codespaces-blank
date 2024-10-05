<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $domain = filter_input(INPUT_POST, 'domain', FILTER_SANITIZE_STRING);

    if (!$domain) {
        header('Location: subdomains.php?error=Invalid domain name');
        exit;
    }

    $subdomains = fetchSubdomainsFromCrtSh($domain);

    if ($subdomains && count($subdomains) > 0) {
        $subdomains_str = implode(',', $subdomains);
        header("Location: subdomains.php?subdomains=" . urlencode($subdomains_str));
    } else {
        header('Location: subdomains.php?error=No subdomains found or an error occurred.');
    }
    exit;
}

function fetchSubdomainsFromCrtSh($domain) {
    // Query crt.sh using SQL-like queries
    $url = "https://crt.sh/?q=%25.$domain&output=json";

    // Make the HTTP GET request to crt.sh
    $response = @file_get_contents($url);

    if ($response === false) {
        // Return an empty array if an error occurred
        return [];
    }

    $data = json_decode($response, true);
    $subdomains = [];

    // Extract subdomains from the result
    foreach ($data as $cert) {
        $name_value = $cert['name_value'];

        // If it's a wildcard domain (e.g., *.example.com), skip it
        if (strpos($name_value, '*') === false) {
            $subdomains[] = $name_value;
        }
    }

    // Remove duplicates and return the subdomains
    return array_unique($subdomains);
}
?>

