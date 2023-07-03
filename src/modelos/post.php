<?php

namespace Felip\Poo\modelos;

use Felip\Poo\utils\UUID;

class Post{

    private string $id;
    private array $likes;

    public function __construct(private string $mensaje){
        $this->id = UUID::generate();
        $this->likes = [];
    }

    protected function saludo(){
        return "Hola desde este metodo, id $this->id";
    }

    public function getId(): string{
        return $this->id;
    }

    public function setId(string $id){
        $this->id = $id;
    }

    public function getMensaje():string {
        return $this->mensaje;
    }

    public function getLikes(){
        return $this->likes;
    }

    protected function checkIfUserLiked(User $user):bool{
        $found = array_filter(
            $this->likes,
            function(Like $like) use ($user){
                return $like->getUser()->getId() === $user->getId();
            }
        );

        return count($found) === 1;
    }

    public function addLike(User $user) {
        if($this->checkIfUserLiked($user)){
            $this->removeLike($user);
        }
        else{
            $like = new Like($user);
            array_push($this->likes, $user);
        }
    }

    private function removeLike(User $user){
        $this->likes = array_filter(
            $this->likes,
            fn (Like $like) => $like->getUser()->getId() !== $user->getId()
        );
    }

}