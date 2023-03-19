<?php
    require_once 'vendor/autoload.php';

    $head = new webmonsterSEO\HeadGenerator();
    $head->setLanguage('fr');
    $head->setViewport('width=device-width, initial-scale=1');
    $head->setTitle("Titre de la page - Mots clés importants | Nom de la marque");
    $head->setDescription("Description pertinente de la page en moins de 160 caractères");
    $head->addMeta('keywords', 'Mots clés importants séparés par des virgules');
    $head->setCanonicalUrl('https://www.example.com/canonical-url');
    $head->addMeta('robots', 'noindex, nofollow');

    // add CSS links
    $head->addStyleSheetUrl('https://www.example.com/css/style.css');
    $head->addStyleSheetUrl('https://www.example.com/css/theme.css');

    // add JS links
    $head->addScriptUrl('https://www.example.com/js/script.js');
    $head->addScriptUrl('https://www.example.com/js/plugins.js');
    $head = $head->render();
    echo $head;
