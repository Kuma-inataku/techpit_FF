<?php
// require_once('./classes/Lives.php');
// require_once('./classes/Human.php');
// require_once('./classes/Enemy.php');
// require_once('./classes/Brave.php');
// require_once('./classes/BlackMage.php');
// require_once('./classes/WhiteMage.php');
require_once('./lib/Loader.php');
require_once('./lib/Utility.php');

//オートロード
$loader = new Loader();

// classesフォルダの中身をロード対象ディレクトリとして登録
$loader->regDirectory(__DIR__ . '/classes');
$loader->register();


//インスタンス化
// $tiida = new Brave('ティーダ');
$members = array();
$members[]=new Brave('ティーダ');
$members[]=new WhiteMage('ユウナ');
$members[]=new BlackMage('ルール―');

$enemies = array();
$enemies[] = new Enemy('ゴブリン',20);
$enemies[] = new Enemy('ボム', 25);
$enemies[] = new Enemy('モルポル',30);

//↓に変更は可能か

// $members = array('ティーダ','ユウナ','ルール―');

// $goblin = new Enemy('ゴブリン',20);
// $bom = new Enemy('ボム',25);
// $molpol = new Enemy('モルポル',30);
// $enemies = array($goblin,$bom,$molpol);

//ターン数
$turn = 1;

$isFinishFlg = false;

$messageObj = new Message;



while(!$isFinishFlg){
    
    // echo "***" . $turn . "ターン目***\n";
    echo "*** $turn ターン目***\n";
    
    //仲間の表示
    $messageObj->displayStatusMessage($members);
    //敵の表示
    $messageObj->displayStatusMessage($enemies);
    
    // echo "\n";
    // foreach($members as $member){
    // echo $member->getName() . "：" . $member->getHitPoint() . "/" . $member::MAX_HITPOINT . "\r\n";
    // }
    // echo "\n";
    // foreach($enemies as $enemy){
    // echo $enemy->getName() . "：" . $enemy->getHitPoint() . "/" . $enemy::MAX_HITPOINT . "\r\n";
    // }
    // echo "\n";
    
    //仲間の攻撃
    $messageObj->displayAttackMessage($members,$enemies);
    //敵の攻撃
    $messageObj->displayAttackMessage($enemies,$members);

    // foreach($members as $member){
    //     if (get_class($member)=="WhiteMage"){
    //     // if ($member->getName()=="WhiteMage"){ これではいけないか？
    //         $member->doAttackWhiteMage($enemies, $members);
    //     } else{
    //         $member->doAttack($enemies);
    //     }
    //     echo "\n";
    // }
    // // echo "\n";
    
    // foreach($enemies as $enemy){
    //     $enemy->doAttack($members);
    //     }
    //     echo "\n";
    // echo "\n";

    //戦闘終了条件のチェック 仲間全員のHPが０、または、敵全員のHPが０
    $isFinishFlg =isFinish($members);
    if($isFinishFlg){
        $message = "GAME OVER ....\n\n";
        break;
    }
    
    $isFinishFlg =isFinish($enemies);
    if($isFinishFlg){
        $message = "♪♪♪ファンファーレ♪♪♪\n\n";
        break;
    }
    
    // 仲間全員か敵全員のHPが０になるまで繰り返す
    //仲間の全滅チェック
    // $deathCnt = 0;
    // foreach($members as $member){
    //     if($member->getHitPoint() > 0){
    //         $isFinishFlg = false;
    //         break;
    //     }
    //     $deathCnt++; //$deathCntを増やす仕組みがどこにもない
    // }
    // if($deathCnt === count($members)){
    //     $isFinishFlg = true;
    //     echo "GAME OVER ....\n\n";
    //     break;
    // }
    
    // //敵の全滅チェック
    // $deathCnt = 0;
    // foreach($enemies as $enemy){
    //     if($enemy->getHitPoint() > 0){
    //         $isFinishFlg = false;
    //         break;
    //     }
    //     $deathCnt++;
    // }
    // if($deathCnt === count($enemies)){
    //     $isFinishFlg = true;
    //     echo "♪♪♪ファンファーレ♪♪♪\n\n";
    //     break;
    // }

    $turn ++;
    }
    
    echo "★★★ 戦闘終了 ★★★\r\n";
    
    echo $message;
    //仲間の表示
    $messageObj->displayStatusMessage($members);
    //敵の表示
    $messageObj->displayStatusMessage($enemies);
    
    // foreach($members as $member){
    // echo $member->getName() . "：" . $member->getHitPoint() . "/" . $member::MAX_HITPOINT . "\r\n";
    // }
    // echo "\n";
    
    // foreach($enemies as $enemy){
    // echo $enemy->getName() . "：" . $enemy->getHitPoint() . "/" . $enemy::MAX_HITPOINT . "\r\n";
    // }
    echo "\n";

?>