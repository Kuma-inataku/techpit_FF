<?php 
class BlackMage extends Human{
    const MAX_HITPOINT = 120;
    private $hitPoint =80;
    private $attackPoint = 10;
    private $intelligence = 30; //魔法攻撃力
    
    //コンストラクタ
    public function __construct($name){
        parent::__construct($name, $this->hitPoint,$this->attackPoint);
    }

    //メソッド
    //攻撃メソッド
    public function doAttack($enemies){
            if($this->hitPoint<=0){
        return false;
        }
        $enemyIndex= rand(0,count($enemies) - 1);
        $enemy = $enemies[$enemyIndex];

    if(rand(1,2) === 1){
        echo "『" . $this->getName() . "』のスキルが発動した！\r\n";
        echo "『ファイア』！！\r\n";
        echo "【" . $enemy->getName(). "】に " . $this->intelligence * 1.5 . "のダメージ！\r\n";
        $enemy->tookDamage($this->intelligence *1.5);
    }else{
        parent::doAttack($enemies);
    }
    return true;
}
} 


?>