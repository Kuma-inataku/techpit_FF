<?php
class Brave extends Human{
    //プロパティ
    const MAX_HITPOINT = 120;
    public $hitPoint =self::MAX_HITPOINT;
    public $attackPoint = 30;
    
    //メソッド
    //攻撃メソッド
    public function doAttack($enemy){
        if(rand(1,3) === 1){
            echo "『" . $this->name . "』のスキルが発動した！\r\n";
            echo "『ぜんりょくぎり』！！\r\n";
            echo "【" . $enemy->name . "】に " . $this->attackPoint * 1.5 . "のダメージ！\r\n";
            $enemy->tookDamage($this->attackPoint *1.5);
        }else{
            parent::doAttack($enemy);
        }
        return true;
    }

}
?>

