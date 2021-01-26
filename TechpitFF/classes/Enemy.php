<?php
class Enemy{
    //プロパティ
    const MAX_HITPOINT = 50; //最大HP(固定)
    private $name;
    private $hitPoint = 50;
    private $attackPoint =10;
    
    //コンストラクタ
    public function __construct($name,$attackPoint){
        $this->name = $name;
        $this->attackPoint = $attackPoint;
        // $this->hitPoint = $hitPoint;
        // $this->attackPoint = $attackPoint;
    }
        
    //ゲッター
    public function getName(){
        return $this->name;
    }
    public function getHitPoint(){
        return $this->hitPoint;
    }
    public function getAttackPonit(){
        return $this->attackPoint;
    }

    //メソッド
    //攻撃メソッド
    public function doAttack($humans){
            if($this->hitPoint<=0){
        return false;
        }
        $humanIndex= rand(0,count($humans) - 1);
        $human = $humans[$humanIndex];

        echo "『" . $this->getName() . " 』の攻撃！\r\n";
        echo "【" . $human->getName() .  "】に". $this->attackPoint . "のダメージ！\r\n";
        $human->tookDamage($this->attackPoint);
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