<?php

namespace tests\unit;

use PHPUnit\Framework\TestCase;
use TypeError;
use webmonsterSEO\HeadGenerator;

class testHeadGenerator extends TestCase
{
    private HeadGenerator $headGenerator;

    public function setUp(): void
    {
        $this->headGenerator = new HeadGenerator();
    }

    public function testInvalidSetters(): void
    {
        $invalidData = ['Invalid argument'];

        $this->expectException(TypeError::class);

        $this->headGenerator
            ->setTitle($invalidData)
            ->setDescription($invalidData)
            ->setKeywords($invalidData);
    }

    private function getTestHeadGenerator(): HeadGenerator
    {
        return (new HeadGenerator())
            ->setLanguage('fr')
            ->setViewport('width=device-width, initial-scale=2')
            ->setTitle('Test Title')
            ->setDescription('Test Description')
            ->setKeywords('Test Keywords')
            ->setAuthor('Test Author')
            ->setRobots('index, nofollow')
            ->setCreationDate('2022-03-04')
            ->setLastModified('2022-03-04')
            ->setGeoPosition('37.7749,-122.4194')
            ->setGeoCity('Test Geo City')
            ->setGeoCountry('Test Geo Country')
            ->setCanonicalUrl('https://www.example.com/test-page')
            ->setSitemapUrl('/test-sitemap.xml')
            ->setFaviconUrl('/test-favicon.png')
            ->setThemeColor('#000000')
            ->setSiteName('Test Site Name')
            ->setFbImageUrl('/test-fb-image.jpg')
            ->setTwitterImageUrl('/test-twitter-image.jpg')
            ->setWhatsappImageUrl('/test-whatsapp-image.jpg');
    }

    public function testRenderWithValidDoctypeInput(): void
    {
        $headGenerator = $this->getTestHeadGenerator();

        $this->assertStringContainsString(
            '<!DOCTYPE html>',
            $headGenerator->render(),
            'The rendered output does not contain the HTML doctype declaration'
        );
    }


    public function testRenderWithValidInput(): void
    {
        $headGenerator = $this->getTestHeadGenerator();
        $expectedOutput = '<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=2">
    <meta name="language" content="fr">
    <title>Test Title</title>
    <meta name="description" content="Test Description">
    <meta name="keywords" content="Test Keywords">
    <meta name="author" content="Test Author">
    <meta name="robots" content="index, nofollow">
    <meta name="robots" content="max-snippet:150, max-image-preview:large">
    <meta name="creation_date" content="2022-03-04">
    <meta name="last_modified" content="2022-03-04">
    <meta name="geo.position" content="37.7749,-122.4194">
    <meta name="ICBM" content="37.7749,-122.4194">
    <meta name="place:location:latitude" content="37.7749">
    <meta name="place:location:longitude" content="-122.4194">
    <meta name="place:location:altitude" content="1">
    <meta name="place:location:accuracy" content="100">
    <meta property="business:contact_data:locality" content="Test Geo City">
    <meta property="business:contact_data:country_name" content="Test Geo Country">
    <meta name="referrer" content="no-referrer-when-downgrade">
    <meta name="format-detection" content="telephone=no">
    <link rel="canonical" href="https://www.example.com/test-page">
    <link rel="sitemap" type="application/xml" href="/test-sitemap.xml">
    <link rel="icon" type="image/png" href="/test-favicon.png">
    <meta name="theme-color" content="#000000">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Test Site Name">
    <meta property="og:title" content="Test Title">
    <meta property="og:description" content="Test Description">
    <meta property="og:url" content="https://www.example.com/test-page">
    <meta property="og:image" content="/test-fb-image.jpg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Test Title">
    <meta name="twitter:description" content="Test Description">
    <meta name="twitter:image" content="/test-twitter-image.jpg">
    <meta name="twitter:image:width" content="800">
    <meta name="twitter:image:height" content="400">
    <meta property="og:whatsapp" content="share">
    <meta property="og:image:whatsapp" content="/test-whatsapp-image.jpg">
</head>
';

        $this->assertEquals($expectedOutput, $headGenerator->render());
    }
}
