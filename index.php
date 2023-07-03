<?php

require 'vendor/autoload.php';

use Felip\Poo\modelos\ImagePost;
use Felip\Poo\modelos\User;
use Felip\Poo\modelos\VideoPost;

$marcos = new User('Marcos', 'marcos', 'marcos@marcos.com', 'marcos123*');
$lena = new User('Lena', 'lena', 'lena@lena.com', 'lena123*');
$omar = new User('Omar', 'omar', 'omar@omar.com', 'omar123*');
$maira = new User('Maira', 'maira', 'maira@maira.com', 'maira123*');

$marcosPost = new ImagePost('foto Marcos', 'fotomarcos.jpg');
$lenaPost = new VideoPost('video lena', 'videolena.mp4');
$omarPost = new VideoPost('video omar', 'videoomar.mp4');
$mairaPost = new ImagePost('foto maira', 'fotomaira.jpg');


$marcos->publish($marcosPost);
$lena->publish($lenaPost);
$omar->publish($omarPost);
$maira->publish($mairaPost);


$marcosPost->addLike($lena);
$marcosPost->addLike($omar);

$lenaPost->addLike($marcos);
$lenaPost->addLike($omar);
$lenaPost->addLike($lena);
$lenaPost->addLike($maira);

$omarPost->addLike($lena);
$omarPost->addLike($maira);

$mairaPost->addLike($marcos);
$mairaPost->addLike($lena);
$mairaPost->addLike($omar);


$marcos->addFollower($lena);
$marcos->addFollower($omar);

$lena->addFollower($marcos);

$maira->addFollower($marcos);
$maira->addFollower($omar);
$maira->addFollower($lena);


print_r(User::showProfile($marcos));
print_r(User::showProfile($lena));
print_r(User::showProfile($omar));
print_r(User::showProfile($maira));