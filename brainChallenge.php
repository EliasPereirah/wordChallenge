<?php

function brainChallenge($text){
	$text = trim($text);
	$words = explode(" ",  $text);
	$final_text = '';
	$last_word = '';
	foreach($words as $w){
		$w = trim($w);
		if(mb_strlen($w) <= 3){
			$last_word .= ' '.$w.' ';
			continue;
		}
		$letters = [];
        for($d=0; $d < mb_strlen($w); $d++){
            $letters[] = mb_substr($w, $d,1);
        }

	
		$letters_arr = [];
        $i = 0;
		foreach($letters as $l){
			if($i == 0){
				$first_l = $l;
				$last_word .= $first_l;
			}elseif(empty($letters[($i+1)])){
				$last_l = $l;
				//$last_word = $l;
				//$letters_arr[] = $l;	
			}else{
		       $letters_arr[] = $l;		
			}
			$i++;
		}

        shuffle($letters_arr);
        foreach($letters_arr as $noOrdemWord){
        	$last_word .= $noOrdemWord;
        }
        $last_word .= $last_l.' ';
        $final_text = ' '.$last_word.$last_l.' ';

	}
	return substr($final_text,0, strlen($final_text)-2);
}


### EXEMPLO 
$text = 'O termo Homo sapiens  deriva do latim homem sábio ou homem que sabe e é utilizado para designar cientificamente o homem moderno. Este se difere das demais espécies do Reino Animal pela presença de autoconsciência, racionalidade e sapiência.  O Homo sapiens surgiu há cerca de 300 mil anos e é a única espécie viva de primata bípede que pertence ao gênero Homo, que é composto por espécies como o H.habilis primeiro a utilizar ferramentas de pedra lascada e o H. neanderthalensis considerado o último parente dos humanos';
$challange = brainChallenge($text);
echo $challange;
