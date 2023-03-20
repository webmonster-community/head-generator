![img](https://techmonster.info/assets/img/logo-webmonster-community.png)

# Head Generator (PHP 8)
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
    require_once 'vendor/autoload.php';

    $headGen = new webmonsterSEO\HeadGenerator();
    $headGen->setLanguage("fr")
            ->setViewport('width=device-width, initial-scale=1')
            ->setTitle("Titre de la page - Mots clés importants | Nom de la marque")
            ->setDescription("Description pertinente de la page en moins de 160 caractères")
            ->addMeta('keywords', 'Mots clés importants séparés par des virgules')
            ->setCanonicalUrl('https://www.example.com/canonical-url')
            ->addMeta('robots', 'noindex, nofollow')
            ->addStyleSheetUrl('https://www.example.com/css/style.css')
            ->addStyleSheetUrl('https://www.example.com/css/theme.css')
            ->addScriptUrl('https://www.example.com/js/script.js')
            ->addScriptUrl('https://www.example.com/js/plugin.js');
    $head = $headGen->render();
    echo $head;
```


Visit the Webmonster community [Webmonster](https://webmonster.tech).

# Acknowledgements
Thanks to : WebplusM, SignedA, Audrey.B, yowaiOtoko
