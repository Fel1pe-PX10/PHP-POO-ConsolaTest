<?php

namespace Felip\Poo\modelos;

use Felip\Poo\utils\UUID;

class User{

    private string $id;
    private array $post;
    private array $followers;

    public function __construct(
        private string $name,
        private string $username,
        private string $email,
        private string $password,
    ){
        $this->id = UUID::generate();
        $this->post = [];
        $this->followers = [];
    }

    public function getId(){
        return $this->id;
    }

    public function getUsername(){
        return $this->username;
    }

    public function publish(Post $post){
        \array_push($this->post, $post);
    }

    public function getPost(){
        return $this->post;
    }
    
    public function getFollowers(){
        return $this->followers;
    }

    public function showPost(){
        foreach($this->post as $post){
            var_dump($post->toString());
        }
    }

    private function hasFollower(User $user){
        $found = array_filter(
            $this->followers,
            fn (User $follower) => $follower->id === $user->id
        );

        return count($found) === 1;
    }

    public function addFollower(User $user){
        if(!$this->hasFollower($user)){
            if($this->id === $user->id)
                print_r("No te puedes agregar a ti mismo como follower");
            else
                array_push($this->followers, $user);
        }
        else
            print_r("El usuario {$user->getUsername()} ya es un follower");
    }

    public static function showProfile(User $user){
        $profile = "Username: {$user->getUsername()} \n";
        $profile .= "Followers: ".count($user->followers)."\n";
        $profile .= "Post: ".count($user->getPost())."\n\n";

        return $profile;
    }


}