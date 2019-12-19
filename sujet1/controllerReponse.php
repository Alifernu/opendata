<?php 
$key = $_POST['functionQuestion'];

$key2 = substr($key, 1);

function countQuestion($Q){
    $question = "q".$Q;
    $url = "https://www.data.corsica/api/records/1.0/search/?dataset=barometre-tic-2016-donnees-brutes-base-education";
    $json = file_get_contents($url);
    $parse = json_decode($json);

    $array = $parse->records;
    $response= [];
    $i=0;
    foreach($array as $value){
        $response[$i] = $value->fields->$question;
        $i++;
    }
    asort($response);
    var_dump($response);

    $result = array();
    $prev_value = array('value' => null, 'amount' => null);

foreach ($response as $val) {
    if ($prev_value['value'] != $val) {
        unset($prev_value);
        $prev_value = array('value' => $val, 'amount' => 0);
        $result[] =& $prev_value;
    }

    $prev_value['amount']++;
}
//var_dump($prev_value);

return $result;

} ?>

