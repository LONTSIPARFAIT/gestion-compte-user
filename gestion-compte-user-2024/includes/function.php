<?php
function generateToken($length){

        $alphaNum="AZERTYUIOPQSDFGHJKLMWXCVBNazertyuiopqsdfghjklmwxcvbn0321456987";
    return   substr(str_shuffle(str_repeat($alphaNum,$length)),0,$length);
}
?>