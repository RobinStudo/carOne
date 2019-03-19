<?php
namespace Game\Gameplay;

trait BonusPoint{
    private $point = 0;

    public function addBonus(){
        $this->point++;
    }
}
