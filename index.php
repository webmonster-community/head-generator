<?php
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
