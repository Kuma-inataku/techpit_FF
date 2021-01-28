<?php
class Lives{
    //プロパティ
    private $name;
    private $hitPoint;
    private $attackPoint; //攻撃力
    private $intelligence; //魔法攻撃力
    
    //privateプロパティなのでコンストラクター
    public function __construct($name,$hitPoint=50,$attackPoint=10,$intelligence=0){
        $this->name=$name;
        $this->hitPoint=$hitPoint;
        $this->attackPoint=$attackPoint;
        $this->intelligence=$intelligence;
    }
    //メソッド
    public function getName(){
        return $this->name;
    }
    public function getHitPoint(){
        $result =$this->hitPoint;
        if($result < 0){
            $result=0;
        }
        return $result;
    }
    public function tookDamage($damage){
        $this->hitPoint -= $damage;
        //HPが0以下にならないための処理
        if($this->hitPoint < 0){
            $this->hitPoint=0;
        }
    }
    // public function recoveryDamage($heal,$target){
    public function recoveryDamage($heal, Object $target){
        $this->hitPoint += $heal;
        //最大値を超えて回復しない
        if($this->hitPoint > $target::MAX_HITPOINT){
            $this->hitPoint = $target::MAX_HITPOINT; 
        }
    }
      //  攻撃するメソッド
      public function doAttack($targets)
      {
          if (!$this->isEnableAttack($targets)) {
              return false;
          }
          // ターゲットの決定
          $target = $this->selectTarget($targets);
 
          echo "『" .$this->name . "』の攻撃！\n";
          echo "【" . $target->getName() . "】に " . $this->attackPoint . " のダメージ！ \n";
          $target->tookDamage($this->attackPoint);
          return true;
      }

    //  攻撃ができるかどうかチェック
    public function isEnableAttack($targets)
    {
        // チェック１：自身のHPが0以上かどうか
        if ($this->hitPoint <= 0) {
            return false;
        }
        // チェック２：敵が全員HP0以下かどうか
        $isAllDie = true;
        foreach ($targets as $target) {
            if ($target->getHitPoint() > 0) {
                $isAllDie = false;
            }
        }
        if ($isAllDie) {
            return false;
        }

        // チェックを抜けた場合、攻撃可能
        return true;
    }

    // ターゲットを決めるメソッド
    public function selectTarget($targets)
    {
        $target = $targets[rand(0, count($targets) -1)];
        // 敵のHPが0以下の場合再度ターゲットを決める
        while ($target->getHitPoint() <= 0) {
            $target = $targets[rand(0, count($targets) -1)];
        }
        return $target;
    }
}
?>