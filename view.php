<div>
<h3> Desempenho dos estudantes matriculados </h3>
</div>

<?php

require_once('../../config.php');

global $DB;
global $USER; 

echo "<pre>";



// $resultados possui a média final de todas as atividades entregues pelos alunos;
$resultados = $DB->get_records_sql("SELECT id, userid, rawgrade, AVG(rawgrade) AS MediaFinal FROM `mdl_grade_grades` GROUP BY userid; ");
$valores = array_column($resultados, 'mediafinal'); 
$info = array_column($resultados, 'mediafinal', 'userid'); 

$nomes = $DB->get_records_sql('select id, firstname, lastname from mdl_user');
$id = array_column($nomes, 'id');
$pn = array_column($nomes, 'firstname');
$sn = array_column($nomes, 'lastname');

// O array $info possui os dados de notas e id dos usúarios;
// O array $data possui os dados de id, nome e sobrenome dos usúarios;


$data = array_diff_key($nomes, array($info));


foreach($data as $key=>$val){ 
    $val2 = $info[$key]; 
    $informacoes[$key] = $val + $val2; 
}

$info_completa = array_combine($informacoes, $data);
$boletim = json_decode(json_encode($info_completa), true);



function notas($boletim) {
    foreach($boletim as $n => $item) {
        echo "\n\n";
        if  ($n <= 49) {
            echo $item['firstname'] . " " . $item['lastname'] . " sua nota foi " . $n . ', portanto, você obteve um desempenho com nota baixa. Você precisa estudar mais!';
        }
        elseif ($n >= 50 && $n <=70) {
            echo $item['firstname'] . " " . $item['lastname'] . " sua nota foi " . $n .  ', portanto, você obteve um desempenho com nota média. Você pode melhorar mais!';
        }
        elseif ($n >= 71.00000) {
            echo $item['firstname'] . " " . $item['lastname'] . " sua nota foi " . $n . ', portanto, você obteve um desempenho com nota alta. Continue assim!';
        }
    }
}

echo notas($boletim);

die();

