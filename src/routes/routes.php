<?php

$router = new Router();

$router->get("", function () {
    require_once __DIR__ . "/../../public/pages/home.php";
});
