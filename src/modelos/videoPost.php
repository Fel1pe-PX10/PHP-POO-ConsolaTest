<?php

namespace Felip\Poo\modelos;

class VideoPost extends Post{

    public function __construct(private string $mensaje, private string $video){
        
        parent::__construct($mensaje);
    }

    public function getVideo():string{
        return $this->video;
    }
}