<?php
header('Content-Type: application/json; charset=utf-8');

// URL du flux RSS global (tous les articles HTMLy)
$rss_url = "http://localhost/geospace-togo/feed/rss";

// Charger le flux RSS
$rss = @simplexml_load_file($rss_url);

if (!$rss) {
    echo json_encode(["error" => "Impossible de lire le flux RSS."], JSON_UNESCAPED_UNICODE);
    exit;
}

$posts = [];
$id = 1;

foreach ($rss->channel->item as $item) {

    $title = (string)$item->title;
    $link = (string)$item->link;             // <- Lien complet vers l’article HTMLy
    $description = (string)$item->description;
    $category = isset($item->category) ? (string)$item->category : "";
    $date = (string)$item->pubDate;

    $slug = basename($link);

    $image = "";
    if (isset($item->enclosure) && $item->enclosure['url']) {
        $image = (string)$item->enclosure['url'];
    }

    $content = "";
    if (isset($item->{'content:encoded'})) {
        $content = (string)$item->{'content:encoded'};
    } else {
        $content = $description;
    }

    $posts[] = [
        "id"          => $id++,
        "slug"        => $slug,
        "titre"       => $title,
        "categorie"   => $category,
        "date"        => $date,
        "image"       => $image,
        "auteur"      => "GEOSPACE TOGO",
        "description" => $description,
        "contenu"     => $content,
        "link"        => $link         // <- ajouté pour JS
    ];
}

echo json_encode($posts, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
