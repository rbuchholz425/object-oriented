<?php

namespace rbuchholz425\objectOriented;

require_once (dirname(__DIR__) . "/Classes/autoload.php");

use Ramsey\Uuid\Uuid, rbuchholz425\objectOriented\Author;

$newAuthor = new Author("0850d78d-0ff3-402d-a783-273385ef778d", "authorToken", "myprofilepic.com", "author1234@gmail.com", "password", "JRRTolkien");

echo $newAuthor->getAuthorUsername();