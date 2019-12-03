<?php
function ambilEmail($url){
    $result = file_get_contents("/tmp/ark-3wcDf2/377321_deeds.sql");
    preg_match_all("/[a-z0-9_\-\+\.]+@[a-z0-9\-]+\.([a-z]{2,4})(?:\.[a-z]{2})?/i",$result,$arr_email);
    return $arr_email[0];
}
$semua  = ambilEmail("sayasuka");
$data   =[];
$fileRes= fopen(date('d_m_y_H_i_s').".txt",'w+');
if(count($semua)>0){
    foreach($semua as $dataEmail){
        if(!array_search($dataEmail,$data)){
            array_push($data,$dataEmail);
            fwrite($fileRes,$dataEmail."\n");
        }
    }
}
fclose($fileRes);