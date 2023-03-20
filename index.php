<?php
/*
 * DEBUG
 */
//ini_set('display_errors', 1);
require_once 'vendor/autoload.php';

$headGen = new webmonsterSEO\HeadGenerator();
$headGen->setLanguage("fr")
        ->setViewport('width=device-width, initial-scale=1')
        ->setTitle("Page Title - Important Keywords | Brand Name")
        ->setDescription("Relevant description of the page in less than 160 characters")
        ->setKeywords("Important keywords separated by commas")
        ->setAuthor('Author or company name')
        ->setCanonicalUrl('https://yourdomain.tld')
        ->setRobots('noindex, nofollow')
        ->setCreationDate('2023-03-19')
        ->setLastModified('2023-03-19')
        ->setGeoPosition('14.610360,-61.073381')
        ->setGeoCity('Pilot-River')
        ->setGeoCountry('Martinique')
        ->setSitemapUrl('https://yourdomain.tld/sitemap.xml')
        ->setFaviconUrl('https://yourdomain.tld/favicon.png')
        ->setThemeColor('#ffffff')
        ->setSiteName('Company name')
        ->setFbImageUrl('https://yourdomain.tld/assets/img/fb-share-1200-630.png')
        ->setTwitterImageUrl('https://yourdomain.tld/assets/img/twitter-share-800-400.png')
        ->setWhatsappImageUrl('https://yourdomain.tld/assets/img/whatsapp-share-300-200.png')
        ->addStyleSheetUrl('https://yourdomain.tld/assets/css/style.css')
        ->addScriptUrl('https://yourdomain.tld/assets/js/script.js')
        ->addScriptUrl('https://cdn.example.com/js/plugin.js');
$head = $headGen->render();
echo $head;
