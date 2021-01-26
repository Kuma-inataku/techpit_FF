<?php

class Human{
    //プロパティ
    const MAX_HITPOINT = 100;
    private $name;
    private $hitPoint =100;
    private $attackPoint = 20;
    
    //コンストラクタ
    public function __construct($name, $hitPoint=100, $attackPoint = 20){
        $this->name =$name;
        $this->hitPoint = $hitPoint;
        $this->attackPoint = $attackPoint;
    }
    
    //メソッド
    //攻撃メソッド
    public function doAttack($enemies){
            if($this->hitPoint<=0){
        return false;
        }
        $enemyIndex= rand(0,count($enemies) - 1);
        $enemy = $enemies[$enemyIndex];

        echo "『" . $this->getName() . "』の攻撃！\r\n";
        echo "【" . $enemy->getName() . "】に " . $this->attackPoint . "のダメージ！\r\n";
        $enemy->tookDamage($this->attackPoint);
    }
    //ダメージメソッド
    public function tookDamage($damage){
        $this->hitPoint -= $damage;
        //HPが0未満にならないための処理
        if($this->hitPoint<0){
            $this->hitPoint=0;
        }
    }
    public function recoveryDamage($heal, $target){
        $this->hitPoint += $heal;
        if($this->hitPoint > $target::MAX_HITPOINT){
            $this->hitPoint = $target::MAX_HITPOINT;
        }
    }
    //ゲッター
    public function getName(){
        return $this->name;
    }
    
    public function getHitPoint(){
        return $this->hitPoint;
    }
    
    public function getAttackPoint(){
        return $this->attackPoint;
    }
}

?>