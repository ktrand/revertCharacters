<?php
$str = "Привет! Давно не виделись.";
echo $str . '<br>';
$str1 = 'Privet! Davno ne videlis.';

function revertCharacters($str)
{
   $strArray = explode(' ', $str);
   $marks = '..,?!@#$%^&*\|/`~(){};:\'"';
   $result = '';
   foreach($strArray as $str){
    $mark = '';
    $len = mb_strlen($str)-1;
    $str = iconv('utf-8', 'windows-1251', $str);
	$str = strrev($str);
	$str = iconv('windows-1251', 'utf-8', $str);
    if(strpos($marks, $str[0])!==false){
        $mark = $str[0];
        $str =mb_substr($str, 1);
        $len--;
    }
    if (mb_substr($str, $len, 1) == mb_strtoupper(mb_substr($str, $len, 1))) {
        $str = str_replace(mb_substr($str, $len, 1), mb_strtolower(mb_substr($str, $len, 1)), $str );
        $str = str_replace(mb_substr($str, 0, 1), mb_strtoupper(mb_substr($str, 0, 1)), $str );
    }
    $result .= $str . $mark . ' ';
   }
   echo $result . "<br>";
}
revertCharacters($str);
echo $str1 . '<br>';
revertCharacters($str1);