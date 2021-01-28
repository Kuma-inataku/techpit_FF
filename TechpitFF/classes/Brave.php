<?php
class Brave extends Human{
    //プロパティ
    const MAX_HITPOINT = 120;
    private $hitPoint =self::MAX_HITPOINT;
    private $attackPoint = 30;
    
    private static $instance;
    
    //コンストラクタ
    // public function __construct($name){
    private function __construct($name){
        parent::__construct($name, $this->hitPoint,$this->attackPoint);
    }
    
    // シングルトンで常にインスタンスは一つしか生成しない
    public static function getInstance($name){
        if(empty(self::$instance)){
            self::$instance = new Brave($name);
        }
        return self::$instance;
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
        
        // if($this->hitPoint<=0){
        //     return false;
        // }
        // $enemyIndex= rand(0,count($enemies) - 1);
        // $enemy = $enemies[$enemyIndex];
        
        //乱数の発生
        if(rand(1,3) === 1){
            echo "『" . $this->getName() . "』のスキルが発動した！\r\n";
            echo "『ぜんりょくぎり』！！\r\n";
            echo "【" . $enemy->getName(). "】に " . $this->attackPoint * 1.5 . "のダメージ！\r\n";
            $enemy->tookDamage($this->attackPoint *1.5);
        }else{
            parent::doAttack($enemies);
        }
        return true;
    }

}
?>

