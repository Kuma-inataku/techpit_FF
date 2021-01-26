<?php
class Brave extends Human{
    //プロパティ
    const MAX_HITPOINT = 120;
    public $hitPoint =self::MAX_HITPOINT;
    private $attackPoint = 30;
    
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
        if(rand(1,3) === 1){
            echo "『" . $this->getName() . "』のスキルが発動した！\r\n";
            echo "『ぜんりょくぎり』！！\r\n";
            echo "【" . $enemy->getName(). "】に " . $this->attackPoint * 1.5 . "のダメージ！\r\n";
            // $enemy->tookDamage($this->attackPoint *1.5);
        }else{
            parent::doAttack($enemies);
        }
        return true;
    }

}
?>

