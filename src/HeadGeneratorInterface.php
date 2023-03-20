<?php
namespace webmonsterSEO;

interface HeadGeneratorInterface {

    public function setLanguage(string $language);
    public function setViewport(string $viewport);
    public function setTitle(string $title);
    public function setDescription(string $description);
    public function setKeywords(string $keywords);
    public function setAuthor(string $author);
    public function setRobots(string $robots);
    public function setCreationDate(string $creationDate);
    public function setLastModified(string $lastModified);
    public function setGeoPosition(string $geoPosition);
    public function setGeoCity(string $geoCity);
    public function setGeoCountry(string $geoCountry);
    public function setCanonicalUrl(string $canonicalUrl);
    public function setSitemapUrl(string $sitemapUrl);
    public function setFaviconUrl(string $faviconUrl);
    public function setThemeColor(string $themeColor);
    public function setSiteName(string $siteName);
    public function setFbImageUrl(string $fbImageUrl);
    public function setTwitterImageUrl(string $twitterImageUrl);
    public function setWhatsappImageUrl(string $whatsappImageUrl);
    public function addMeta(string $name, string $content);
    public function render(): string;
}
