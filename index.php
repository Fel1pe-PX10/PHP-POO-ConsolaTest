<?php

require 'vendor/autoload.php';

use Felip\Poo\modelos\ImagePost;
use Felip\Poo\modelos\Post;


$miObjeto = new Post("Primer objeto");
$objetoImagen = new ImagePost('Foto vacaciones', 'foto.jpg');

// $miObjeto->setId('abc123');
// echo $miObjeto->getId();

echo $miObjeto->getMensaje();
