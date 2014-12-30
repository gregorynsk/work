<?php

$book1 = array('title1'=>'Bukvar', 'author1'=>'Kiril', 'pages1'=>80);
$book2 = array('title2'=>'Azbuka', 'author2'=>'Mefodiy', 'pages2'=>33);
$books = array($book1, $book2);
var_dump($books);

echo "Nedavno ya prochital knigi "
.$books['0']['title1']." i ".$books['1']['title2']
        .", napisannie sootvetstvenno avtorami "
        .$books['0']['author1']." i ".$books['1']['author2']
        .", ya osilil v summe "
        .($books['0']['pages1']+$books['1']['pages2'])
        ." straniz, ne ojidal ot sebya podobnogo.";
        
?>

