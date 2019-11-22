<?php

/**
 * @param $tag : la balise à créer
 * @param $content : le contenu de la balise à créer
 * @param $attributes : un tableau associatif des attributs html
 * @param $autoclose : la balise est autofermante
 * 
 * @return string
 */

function htmlTag(
    // les arguments de ma fonction
    string $tag,
    string $content = "",
    array $attributes = [],
    bool $autoclose = false
): string {
    $html = "<$tag";
    $attributeString = "";
    // récupération de la liste des attributs
    foreach ($attributes as $key => $val) {
        $attributeString .= "$key=$val";
    }
    $html .= $attributeString;
    $html .= ">";

    if (!$autoclose) {
        // ajout du contenu
        $html .= $content;
        // fermeture de la balise
        $html .= "</$tag>";
    }
    // retour de la fonction
    return $html;
}
