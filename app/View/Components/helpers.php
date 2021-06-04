<?php

function bbcodetitle($title){ 
    $title1 = str_replace('(', '<span>', $title);
    $title2 = str_replace(')', '</span>', $title1);
    return $title2;      
}




?>