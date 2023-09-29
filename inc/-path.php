<?php

/**
 * Retorna o caminho de diretórios a partir da raiz do projeto
 */
function root($path) {
    return "/CursoPHP/Meu projeto/$path";
}

/**
 * Retorna o caminho de um recurso a partir do url
 */
function base_url($uri) {
    return "http://localhost/lp12/$uri";
}
