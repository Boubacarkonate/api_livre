<?php

$url = "http://localhost:8080/api/api/read_unLivre.php?id=3";

$data = file_get_contents($url);

$result = json_decode($data, true);

var_dump($result);