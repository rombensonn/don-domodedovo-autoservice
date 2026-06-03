<?php
declare(strict_types=1);

$https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || (($_SERVER['SERVER_PORT'] ?? '') === '443');
$scheme = $https ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$baseUrl = $scheme . '://' . $host;
$lastmod = date('Y-m-d');

header('Content-Type: application/xml; charset=utf-8');
echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?= htmlspecialchars($baseUrl . '/index.php', ENT_XML1, 'UTF-8'); ?></loc>
        <lastmod><?= $lastmod; ?></lastmod>
        <priority>1.0</priority>
    </url>
    <url>
        <loc><?= htmlspecialchars($baseUrl . '/privacy.php', ENT_XML1, 'UTF-8'); ?></loc>
        <lastmod><?= $lastmod; ?></lastmod>
        <priority>0.2</priority>
    </url>
</urlset>
