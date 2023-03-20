![img](https://techmonster.info/assets/img/logo-webmonster-community.png)

# Head Generator (PHP)
Fully SEO optimized &lt;head> tag generator

[![Latest Stable Version](http://poser.pugx.org/webmonster-community/head-generator/v)](https://packagist.org/packages/webmonster-community/head-generator)
[![Total Downloads](http://poser.pugx.org/webmonster-community/head-generator/downloads)](https://packagist.org/packages/webmonster-community/head-generator)
[![License](http://poser.pugx.org/webmonster-community/head-generator/license)](https://packagist.org/packages/webmonster-community/head-generator)

## Requirements

PHP 7.4.0 and later.

## Composer

You can install the bindings via [Composer](http://getcomposer.org/). Run the following command:

```bash
composer require webmonster-community/head-generator
```

## How to use it

```php
<?php
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
```

**The resulting <head> was designed to improve the search engine optimization (SEO) of your pages.**

```html

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="language" content="fr">
    <title>Page Title - Important Keywords | Brand Name</title>
    <meta name="description" content="Relevant description of the page in less than 160 characters">
    <meta name="keywords" content="Important keywords separated by commas">
    <meta name="author" content="Author or company name">
    <meta name="robots" content="noindex, nofollow">
    <meta name="robots" content="max-snippet:150, max-image-preview:large">
    <meta name="creation_date" content="2023-03-19">
    <meta name="last_modified" content="2023-03-19">
    <meta name="geo.position" content="14.610360,-61.073381">
    <meta name="ICBM" content="14.610360,-61.073381">
    <meta name="place:location:latitude" content="14.610360">
    <meta name="place:location:longitude" content="-61.073381">
    <meta name="place:location:altitude" content="1">
    <meta name="place:location:accuracy" content="100">
    <meta property="business:contact_data:locality" content="Pilot-River">
    <meta property="business:contact_data:country_name" content="Martinique">
    <meta name="referrer" content="no-referrer-when-downgrade">
    <meta name="format-detection" content="telephone=no">
    <link rel="canonical" href="https://yourdomain.tld">
    <link rel="sitemap" href="https://yourdomain.tld/sitemap.xml">
    <link rel="icon" type="image/png" href="https://yourdomain.tld/favicon.png">
    <meta name="theme-color" content="#ffffff">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Company name">
    <meta property="og:title" content="Page Title - Important Keywords | Brand Name">
    <meta property="og:description" content="Relevant description of the page in less than 160 characters">
    <meta property="og:url" content="https://yourdomain.tld">
    <meta property="og:image" content="https://yourdomain.tld/assets/img/fb-share-1200-630.png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Page Title - Important Keywords | Brand Name">
    <meta name="twitter:description" content="Relevant description of the page in less than 160 characters">
    <meta name="twitter:image" content="https://yourdomain.tld/assets/img/twitter-share-800-400.png">
    <meta name="twitter:image:width" content="800">
    <meta name="twitter:image:height" content="400">
    <meta property="og:whatsapp" content="share">
    <meta property="og:image:whatsapp" content="https://yourdomain.tld/assets/img/whatsapp-share-300-200.png">
    <link rel="prefetch" href="https://yourdomain.tld/assets/css/style.css">
    <link rel="stylesheet" href="https://yourdomain.tld/assets/css/style.css">
    <link rel="dns-prefetch" href="https://yourdomain.tld">
    <script src="https://yourdomain.tld/assets/js/script.js"></script>
    <link rel="dns-prefetch" href="https://cdn.example.com">
    <script src="https://cdn.example.com/js/plugin.js"></script>
</head>
```

If you have any questions or possible improvements, we would be delighted to incorporate them and welcome you as a contributor.

Visit the Webmonster community [Webmonster](https://webmonster.tech).

# Acknowledgements
Thanks to : WebplusM, SignedA, Audrey.B, yowaiOtoko
