<?php
namespace webmonsterSEO;

use InvalidArgumentException;

class HeadGenerator implements HeadGeneratorInterface {

    protected string    $language = 'en';
    protected string    $viewport = 'width=device-width, initial-scale=1';
    protected string    $title = '';
    protected string    $description = '';
    protected string    $keywords = '';
    protected string    $author = '';
    protected string    $robots = 'index, follow';
    protected string    $creationDate = '';
    protected string    $lastModified = '';
    protected string    $geoPosition = '';
    protected string    $geoCity = '';
    protected string    $geoCountry = '';
    protected string    $canonicalUrl = '';
    protected string    $sitemapUrl = '/sitemap.xml';
    protected string    $faviconUrl = '/favicon.png';
    protected string    $themeColor = '#ffffff';
    protected string    $siteName = '';
    protected string    $fbImageUrl = '';
    protected string    $twitterImageUrl = '';
    protected string    $whatsappImageUrl = '';
    protected array     $styleSheetUrls = [];
    protected array     $scriptUrls = [];
    protected array     $metaTags = [];

    /**
     * @return false|string
     */
    public function getCanonicalLink() {
        if (!empty($_SERVER)) {
            $url = $_SERVER['REQUEST_URI'];
            $url = rtrim($url, '/');
            return sprintf('%s://%s%s', isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http', $_SERVER['HTTP_HOST'], $url);
        }
        return false;
    }

    /**
     * @param string $language
     * @return $this
     */
    public function setLanguage(string $language): HeadGenerator
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @param string $viewport
     * @return $this
     */
    public function setViewport(string $viewport): HeadGenerator
    {
        $this->viewport = $viewport;
        return $this;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): HeadGenerator
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description): HeadGenerator
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param string $keywords
     * @return $this
     */
    public function setKeywords(string $keywords): HeadGenerator
    {
        $this->keywords = $keywords;
        return $this;
    }

    /**
     * @param string $author
     * @return $this
     */
    public function setAuthor(string $author): HeadGenerator
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @param string $robots
     * @return $this
     */
    public function setRobots(string $robots): HeadGenerator
    {
        $this->robots = $robots;
        return $this;
    }

    /**
     * @param string $creationDate
     * @return $this
     */
    public function setCreationDate(string $creationDate): HeadGenerator
    {
        $this->creationDate = $creationDate;
        return $this;
    }

    /**
     * @param string $lastModified
     * @return $this
     */
    public function setLastModified(string $lastModified): HeadGenerator
    {
        $this->lastModified = $lastModified;
        return $this;
    }

    /**
     * @param string $geoPosition
     * @return $this
     */
    public function setGeoPosition(string $geoPosition): HeadGenerator
    {
        // Check if $geoPosition is in the correct format of "latitude,longitude"
        if (!preg_match('/^[-]?([0-8]?[0-9]|90)[.][0-9]{1,10},[-]?((1[0-7]|[0-9])?[0-9]|[1-9][0-9])[.][0-9]{1,10}$/', $geoPosition)) {
            throw new InvalidArgumentException('Invalid format for geoPosition. Should be in the format "latitude,longitude"');
        }

        $this->geoPosition = $geoPosition;
        return $this;
    }

    /**
     * @param string $geoCity
     * @return $this
     */
    public function setGeoCity(string $geoCity): HeadGenerator
    {
        $this->geoCity = $geoCity;
        return $this;
    }

    /**
     * @param string $geoCountry
     * @return $this
     */
    public function setGeoCountry(string $geoCountry): HeadGenerator
    {
        $this->geoCountry = $geoCountry;
        return $this;
    }

    /**
     * @param string $canonicalUrl
     * @return $this
     */
    public function setCanonicalUrl(string $canonicalUrl): HeadGenerator
    {
        $this->canonicalUrl = $canonicalUrl;
        return $this;
    }

    /**
     * @param string $sitemapUrl
     * @return $this
     */
    public function setSitemapUrl(string $sitemapUrl): HeadGenerator
    {
        $this->sitemapUrl = $sitemapUrl;
        return $this;
    }

    /**
     * @param string $faviconUrl
     * @return $this
     */
    public function setFaviconUrl(string $faviconUrl): HeadGenerator
    {
        $this->faviconUrl = $faviconUrl;
        return $this;
    }

    /**
     * @param string $themeColor
     * @return $this
     */
    public function setThemeColor(string $themeColor): HeadGenerator
    {
        $this->themeColor = $themeColor;
        return $this;
    }

    /**
     * @param string $siteName
     * @return $this
     */
    public function setSiteName(string $siteName): HeadGenerator
    {
        $this->siteName = $siteName;
        return $this;
    }

    /**
     * @param string $fbImageUrl
     * @return $this
     */
    public function setFbImageUrl(string $fbImageUrl): HeadGenerator
    {
        $this->fbImageUrl = $fbImageUrl;
        return $this;
    }

    /**
     * @param string $twitterImageUrl
     * @return $this
     */
    public function setTwitterImageUrl(string $twitterImageUrl): HeadGenerator
    {
        $this->twitterImageUrl = $twitterImageUrl;
        return $this;
    }

    /**
     * @param string $whatsappImageUrl
     * @return $this
     */
    public function setWhatsappImageUrl(string $whatsappImageUrl): HeadGenerator
    {
        $this->whatsappImageUrl = $whatsappImageUrl;
        return $this;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function addStyleSheetUrl(string $url): HeadGenerator
    {
        $this->styleSheetUrls[] = $url;
        return $this;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function addScriptUrl(string $url): HeadGenerator
    {
        $this->scriptUrls[] = $url;
        return $this;
    }

    /**
     * @param string $name
     * @param string $content
     * @return $this
     */
    public function addMeta(string $name, string $content): HeadGenerator
    {
        $this->metaTags[] = ['name' => $name, 'content' => $content];
        return $this;
    }

    /**
     * @param string $format
     * @param string $value
     * @return string
     */
    public function addContent(string $format, string $value): string
    {
        return $value ? (sprintf($format, $value) . "\n") : '';
    }

    /**
     * @param string $url
     * @return string|null
     */
    public function get_external_domain_url(string $url): ?string {
        $url_parts = parse_url($url);
        if ($url_parts === false || !isset($url_parts['scheme'], $url_parts['host'])) {
            return null;
        }
        $external_domain_url = $url_parts['scheme'] . '://' . $url_parts['host'];
        $current_domain_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . '://' . $_SERVER['HTTP_HOST'];
        if ($external_domain_url !== $current_domain_url) {
            return $external_domain_url;
        }
        return null;
    }

    /**
     * @return string
     */
    public function render(): string
    {

        $html = '<!DOCTYPE html>' . "\n";
        $html .= '<html lang="' . $this->language . '">' . "\n";
        $html .= '<head>' . "\n";
        $html .= '    <meta charset="UTF-8">' . "\n";
        $html .= $this->addContent('    <meta name="viewport" content="%s">', $this->viewport);
        $html .= $this->addContent('    <meta name="language" content="%s">', $this->language);
        $html .= $this->addContent('    <title>%s</title>', $this->title);
        $html .= $this->addContent('    <meta name="description" content="%s">', $this->description);
        $html .= $this->addContent('    <meta name="keywords" content="%s">', $this->keywords);
        $html .= $this->addContent('    <meta name="author" content="%s">', $this->author);
        $html .= $this->addContent('    <meta name="robots" content="%s">', $this->robots);
        $html .= '    <meta name="robots" content="max-snippet:150, max-image-preview:large">'."\n";
        $html .= $this->addContent('    <meta name="creation_date" content="%s">', $this->creationDate);
        $html .= $this->addContent('    <meta name="last_modified" content="%s">', $this->lastModified);
        $html .= $this->addContent('    <meta name="geo.position" content="%s">', $this->geoPosition);
        $html .= $this->addContent('    <meta name="ICBM" content="%s">', $this->geoPosition);
        $location = explode(",", $this->geoPosition);
        $html .= $this->addContent('    <meta name="place:location:latitude" content="%s">', trim($location[0]));
        $html .= $this->addContent('    <meta name="place:location:longitude" content="%s">', trim($location[1]));
        $html .= $this->addContent('    <meta name="place:location:altitude" content="%s">', "1");
        $html .= $this->addContent('    <meta name="place:location:accuracy" content="%s">', "100");
        $html .= $this->addContent('    <meta property="business:contact_data:locality" content="%s">', $this->geoCity);
        $html .= $this->addContent('    <meta property="business:contact_data:country_name" content="%s">', $this->geoCountry);
        $html .= '    <meta name="referrer" content="no-referrer-when-downgrade">'."\n";
        $html .= '    <meta name="format-detection" content="telephone=no">'."\n";

        if(empty($this->canonicalUrl)){
            $this->canonicalUrl = $this->getCanonicalLink();
        }
        $html .= '    <link rel="canonical" href="' . $this->canonicalUrl . '">'. "\n";
        $html .= $this->addContent('    <link rel="sitemap" type="application/xml" href="%s">', $this->sitemapUrl);
        $html .= $this->addContent('    <link rel="icon" type="image/png" href="%s">', $this->faviconUrl);
        $html .= $this->addContent('    <meta name="theme-color" content="%s">', $this->themeColor);

        $html .= '    <meta property="og:type" content="website">'."\n";
        $html .= $this->addContent('    <meta property="og:site_name" content="%s">', $this->siteName);
        $html .= $this->addContent('    <meta property="og:title" content="%s">', $this->title);
        $html .= $this->addContent('    <meta property="og:description" content="%s">', $this->description);
        $html .= $this->addContent('    <meta property="og:url" content="%s">', $this->canonicalUrl);
        $html .= $this->addContent('    <meta property="og:image" content="%s">', $this->fbImageUrl);
        if(!empty($this->fbImageUrl)){
            $html .= '    <meta property="og:image:width" content="1200">'."\n";
            $html .= '    <meta property="og:image:height" content="630">'."\n";
        }

        $html .= '    <meta name="twitter:card" content="summary_large_image">'."\n";
        $html .= $this->addContent('    <meta name="twitter:title" content="%s">', $this->title);
        $html .= $this->addContent('    <meta name="twitter:description" content="%s">', $this->description);
        $html .= $this->addContent('    <meta name="twitter:image" content="%s">', $this->twitterImageUrl);
        if(!empty($this->twitterImageUrl)){
            $html .= '    <meta name="twitter:image:width" content="800">'."\n";
            $html .= '    <meta name="twitter:image:height" content="400">'."\n";
        }

        $html .= '    <meta property="og:whatsapp" content="share">'."\n";
        $html .= $this->addContent('    <meta property="og:image:whatsapp" content="%s">', $this->whatsappImageUrl);

        // Add additional meta tags
        foreach ($this->metaTags as $meta) {
            $html .= '    <meta name="' . $meta['name'] . '" content="' . $meta['content'] . '">' . "\n";
        }

        // Add CSS links
        foreach ($this->styleSheetUrls as $url) {
            $html .= '    <link rel="prefetch" href="' . $url . '">' . "\n";
            $html .= '    <link rel="stylesheet" href="' . $url . '">' . "\n";
        }

        // Add JS links
        foreach ($this->scriptUrls as $url) {
            if(!empty($this->get_external_domain_url($url))){
                $html .= '    <link rel="dns-prefetch" href="' . $this->get_external_domain_url($url) . '">' . "\n";
            }
            $html .= '    <script src="' . $url . '"></script>' . "\n";
        }

        $html .= '</head>' . "\n";
        return $html;
    }
}
