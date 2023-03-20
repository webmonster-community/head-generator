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
        ->setAuthor("Author or company name")
        ->setCanonicalUrl("")
        ->setRobots("noindex, nofollow")
        ->setCreationDate("2023-03-19")
        ->setLastModified("2023-03-19")
        ->setGeoPosition("14.610360,-61.073381")
        ->addStyleSheetUrl('https://www.example.com/css/style.css')
        ->addStyleSheetUrl('https://www.example.com/css/theme.css')
        ->addScriptUrl('https://www.example.com/js/script.js')
        ->addScriptUrl('https://www.example.com/js/plugin.js');
$head = $headGen->render();
echo $head;
