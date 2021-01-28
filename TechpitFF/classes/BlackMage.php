<?php 
class BlackMage extends Human{
    const MAX_HITPOINT = 80;
    private $hitPoint =80;
    private $attackPoint = 10;
    private $intelligence = 30; //魔法攻撃力
    
    //コンストラクタ
    public function __construct($name){
        parent::__construct($name, $this->hitPoint,$this->attackPoint,$this->intelligence);
    }

    //メソッド
    //攻撃メソッド
    public function doAttack($enemies){
        //自分のHPが0以上か、敵のHPが0以上かなどをチェックするメソッドを用意。
        if (!$this->isEnableAttack($enemies)){
            return false;
        }
        //ターゲットの決定
        $enemy = $this->selectTarget($enemies);

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