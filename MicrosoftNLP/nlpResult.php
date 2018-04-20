<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abbas
 * Date: 20/04/2018
 * Time: 21:46
 */

$array = $_REQUEST['data'];

$nlp = new funcLanM();
$nlps = $nlp->langauge($array);


echo $nlps;