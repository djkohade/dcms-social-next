<?php

$k_p=$db->query("SELECT COUNT(*) FROM `notes`")->el();
$k_n= $db->query("SELECT COUNT(*) FROM `notes` WHERE `time` > '".$ftime."'")->el();
if ($k_n==0) {
    $k_n=null;
} else {
    $k_n='+'.$k_n;
}
echo "($k_p) <font color='red'>$k_n</font>";