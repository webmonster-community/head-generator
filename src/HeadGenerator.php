<?php
namespace webmonsterSEO;

interface HeadGeneratorInterface {

    public function setLanguage(string $language);
    public function setViewport(string $viewport);
    public function setTitle(string $title);
    public function setDescription(string $description);
    public function setKeywords(string $keywords);
    public function setAuthor(string $author);
    public function setCreationDate(string $creationDate);
    public function setLastModified(string $lastModified);
    public function setCanonicalUrl(string $canonicalUrl);
    public function setRobots(string $robots);
    public function addMeta(string $name, string $content);
    public function render(): string;
}

class HeadGenerator implements HeadGeneratorInterface {

    protected string    $language = 'en';
    protected string    $viewport = 'width=device-width, initial-scale=1';
    protected string    $title = '';
    protected string    $description = '';
    protected string    $keywords = '';
    protected string    $author = '';
    protected string    $creationDate = '';
    protected string    $lastModified = '';
    protected string    $canonicalUrl = '';
    protected string    $robots = 'index, follow';
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
     * @param string $canonicalUrl
     * @return $this
     */
    public function setCanonicalUrl(string $canonicalUrl): HeadGenerator
    {
        if(empty($canonicalUrl)){
            $this->canonicalUrl = $this->getCanonicalLink();
        }else{
            $this->canonicalUrl = $canonicalUrl;
        }
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
     * @return string
     */
    public function render(): string
    {

        $html = '<!DOCTYPE html>' . "\n";
        $html .= '<html lang="' . $this->language . '">' . "\n";
        $html .= '<head>' . "\n";
        $html .= '    <meta charset="UTF-8">' . "\n";
        $html .= $this->addContent('<meta name="viewport" content="%s">' . "\n", $this->viewport);
        $html .= $this->addContent('<meta name="language" content="%s">' . "\n", $this->language);
        $html .= $this->addContent('<title>%s</title>' . "\n", $this->title);
        $html .= $this->addContent('<meta name="description" content="%s">' . "\n", $this->description);
        $html .= $this->addContent('<meta name="keywords" content="%s">' . "\n", $this->keywords);
        $html .= $this->addContent('<meta name="author" content="%s">' . "\n", $this->author);
        $html .= $this->addContent('<meta name="robots" content="%s">' . "\n", $this->robots);
        $html .= $this->addContent('<meta name="creation_date" content="%s">' . "\n", $this->creationDate);
        $html .= $this->addContent('<meta name="last_modified" content="%s">' . "\n", $this->lastModified);
        $html .= $this->addContent('<link rel="canonical" href="%s">' . "\n", $this->canonicalUrl);

        // Add additional meta tags
        foreach ($this->metaTags as $meta) {
            $html .= '    <meta name="' . $meta['name'] . '" content="' . $meta['content'] . '">' . "\n";
        }

        // Add CSS links
        foreach ($this->styleSheetUrls as $url) {
            $html .= '    <link rel="stylesheet" href="' . $url . '">' . "\n";
        }

        // Add JS links
        foreach ($this->scriptUrls as $url) {
            $html .= '    <script src="' . $url . '"></script>' . "\n";
        }

        $html .= '</head>' . "\n";
        return $html;
    }
}
