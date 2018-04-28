<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abbas
 * Date: 28/04/2018
 * Time: 12:51
 */
$phrase = $_SESSION['phrase'];

echo $phrase;
/*
$search = 'SELECT * FROM `bbcnewstop` WHERE (`Title` LIKE '%".$phrase."%')';

$datas = mysqli_query($con, $search);
if(mysqli_num_rows($datas)> 0){
    while ($result = mysqli_fetch_array($datas) ){
        echo "<p>".$results. "</p>>";
    }
} else{
    echo "No result";
}
*/