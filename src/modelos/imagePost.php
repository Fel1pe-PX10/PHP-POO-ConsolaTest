<?php

namespace Felip\Poo\modelos;

class ImagePost extends Post{

    public function __construct(private string $mensaje, private string $image){
        parent::__construct($mensaje);
    }

    public function getImagen():string{
        return $this->image;
    }
}