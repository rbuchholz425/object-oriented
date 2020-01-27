<?php

namespace rbuchholz425\ObjectOriented;

require_once (dirname(__DIR__) . "/Classes/autoload.php");

use rbuchholz425\ObjectOriented\Author;

$hash = password_hash("password", PASSWORD_ARGON2I, ["time_cost" => 7]);

$newAuthor = new Author("0850d78d-0ff3-402d-a783-273385ef778d", "12345678901234567890123456789012", "myprofilepic.com", "author1234@gmail.com", $hash, "JRRTolkien");

echo ($newAuthor-> getAuthorId()),($newAuthor-> getAuthorActivationToken()),($newAuthor-> getAuthorAvatarUrl()),($newAuthor-> getAuthorEmail()),($newAuthor-> getAuthorHash()),($newAuthor-> getAuthorUsername());