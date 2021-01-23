<?php

class Human{
    //プロパティ
    const MAX_HITPOINT = 100;
    public $name;
    public $hitPoint =100;
    public $attackPoint = 20;
    
    //メソッド
    //攻撃メソッド
    public function doAttack($enemy){
        echo "『" . $this->name . "』の攻撃！\r\n";
        echo "【" . $enemy->name . "】に " . $this->attackPoint . "のダメージ！\r\n";
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
    
}

?>