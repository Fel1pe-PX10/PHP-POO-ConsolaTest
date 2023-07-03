<?php

namespace Felip\Poo\modelos;

use IPost;

class ImagePost extends Post implements IPost{

    public function __construct(private string $mensaje, private string $image){
        parent::__construct($mensaje);
    }

    public function getImagen():string{
        return $this->image;
    }

    public function toString():string{
        $info = "Id: {$this->getId()} \n";
        $info .= "Mensaje: {$this->getMensaje()}\n";
        $info .= "Imagen: {$this->getImagen()}\n\n";
        $info .= "Likes: ".count($this->getLikes())."\n\n";

        return $info;
    }
}