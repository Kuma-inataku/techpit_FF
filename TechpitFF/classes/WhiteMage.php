<?php 
class WhiteMage extends Human{
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
    public function doAttackWhiteMage($enemies,$humans){
                if($this->hitPoint<=0){
            return false;
        }
        $humanIndex= rand(0,count($humans) - 1);
        $human = $humans[$humanIndex];

    if(rand(1,2) === 1){
        echo "『" . $this->getName() . "』のスキルが発動した！\r\n";
        echo "『ケアル』！！\r\n";
        echo "【" . $human->getName(). "】のHPを" . $this->intelligence * 1.5 . "回復！\r\n";
        $human->recoveryDamage($this->intelligence *1.5, $human);
    }else{
        parent::doAttack($enemies);
    }
    return true;
}
} 


?>