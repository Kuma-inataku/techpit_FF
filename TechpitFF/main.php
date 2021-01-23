<?php

require_once('./classes/Human.php');
require_once('./classes/Enemy.php');
require_once('./classes/Brave.php');


//インスタンス化
$tiida = new Brave();
$goblin = new Enemy();

$tiida->name = "ティーダ";
$goblin->name = "ゴブリン";

//ターン数
$turn = 1;

// HP=0になるまで繰りかえし
while($tiida->hitPoint > 0 && $goblin->hitPoint > 0){
    
    // echo "***" . $turn . "ターン目***\n";
    echo "*** $turn ターン目***\n";
    echo "\n";
    echo $tiida->name . "：" . $tiida->hitPoint . "/" . $tiida::MAX_HITPOINT . "\r\n";
    echo $goblin->name . "：" . $goblin->hitPoint . "/" . $goblin::MAX_HITPOINT . "\r\n";
    echo "\n";
    $tiida->doAttack($goblin) . "\n";
    $goblin->doAttack($tiida) . "\n";
    echo "\n";
    $turn ++;
    }
    echo "★★★ 戦闘終了 ★★★\r\n";
    echo $tiida->name . "：" . $tiida->hitPoint . "/" . $tiida::MAX_HITPOINT . "\r\n";
    echo $goblin->name . "：" . $goblin->hitPoint . "/" . $goblin::MAX_HITPOINT . "\r\n";
    echo "\n";

?>