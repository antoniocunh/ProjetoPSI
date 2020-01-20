<?php
//require da verificação do login
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyLogin.php");
//require da verificação da role de admin
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyAdminRole.php");
//require da class event
require($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.Event.php");
$event = new Event();

/**
 * insere objeto evento se o select all das suas colunas tiver vazio
 */
if (empty($event->SelectAllBP("?", "1 = 1"))) {
     $event->InsertObject();
}