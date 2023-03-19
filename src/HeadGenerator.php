<?php

namespace webmonsterSEO;

interface HeadGeneratorInterface {

    public function setLanguage(string $language): void;
    public function setViewport(string $viewport): void;
    public function setTitle(string $title): void;
    public function setDescription(string $description): void;
    public function setCanonicalUrl(string $canonicalUrl): void;
    public function setRobots(string $robots): void;
    public function addMeta(string $name, string $content): void;
    public function render(): string;
}

class HeadGenerator implements HeadGeneratorInterface {

    protected string $language = 'en';
    protected string $viewport = 'width=device-width, initial-scale=1';
    protected string $title = '';
    protected string $description = '';
    protected string $canonicalUrl = '';
    protected string $robots = 'index, follow';
    protected array $styleSheetUrls = [];
    protected array $scriptUrls = [];
    protected array $metaTags = [];

    public function setLanguage(string $language): HeadGenerator
    {
        $this->language = $language;
        return $this;
    }

    public function setViewport(string $viewport): HeadGenerator
    {
        $this->viewport = $viewport;
        return $this;
    }

    public function setTitle(string $title): HeadGenerator
    {
        $this->title = $title;
        return $this;
    }

    public function setDescription(string $description): HeadGenerator
    {
        $this->description = $description;
        return $this;
    }

    public function setCanonicalUrl(string $canonicalUrl): HeadGenerator
    {
        $this->canonicalUrl = $canonicalUrl;
        return $this;
    }

    public function setRobots(string $robots): HeadGenerator
    {
        $this->robots = $robots;
        return $this;
    }

    public function addStyleSheetUrl(string $url): HeadGenerator
    {
        $this->styleSheetUrls[] = $url;
        return $this;
    }

    public function addScriptUrl(string $url): HeadGenerator
    {
        $this->scriptUrls[] = $url;
        return $this;
    }

    public function addMeta(string $name, string $content): HeadGenerator
    {
        $this->metaTags[] = ['name' => $name, 'content' => $content];
        return $this;
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
        $html .= '    <meta name="viewport" content="' . $this->viewport . '">' . "\n";
        $html .= '    <meta name="language" content="' . $this->language . '">' . "\n";
        $html .= '    <title>' . $this->title . '</title>' . "\n";
        $html .= '    <meta name="description" content="' . $this->description . '">' . "\n";
        $html .= '    <meta name="robots" content="' . $this->robots . '">' . "\n";
        $html .= '    <link rel="canonical" href="' . $this->canonicalUrl . '">' . "\n";

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
