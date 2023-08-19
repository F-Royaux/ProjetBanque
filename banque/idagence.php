<?php 


$rand=000;
function randagence($rand){
$strlengthagence = 3;
$rand = $rand+1;
$rand =substr("000{$rand}",-$strlengthagence);
return $rand;
}

$idagence=randagence($rand);
echo($idagence);
