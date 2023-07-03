<?php

namespace Felip\Poo\modelos;

use IPost;

class VideoPost extends Post implements IPost{

    public function __construct(private string $mensaje, private string $video){
        
        parent::__construct($mensaje);
    }

    public function getVideo():string{
        return $this->video;
    }

    public function toString():string{
        $info = "Id: {$this->getId()} \n";
        $info .= "Mensaje: {$this->getMensaje()}\n";
        $info .= "Vieo: {$this->getVideo()}\n\n";
        $info .= "Likes: ".count($this->getLikes())."\n\n";

        return $info;
    }
}