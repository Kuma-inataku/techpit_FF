<?php
class Enemy{
    const MAX_HITPOINT = 50; //最大HP(固定)
    public $name;
    public $hitPoint = 50;
    public $attackPoint =10;
    
    //メソッド
    
    //攻撃メソッド
    public function doAttack($human){
        echo "『" . $this->name . " 』の攻撃！\r\n";
        echo "【" . $human->name .  "】に". $this->attackPoint . "のダメージ！\r\n";
        $human->tookDamage($this->attackPoint);
    
    //ダメージメソッド    
    public function tookDamage($damage){
        $this->hitPoint -= $damage;
        //HPが0未満にならないための処理
        if($this->hitPoint < 0){
            $this->hitPoint = 0;
        }
    }
}
?>