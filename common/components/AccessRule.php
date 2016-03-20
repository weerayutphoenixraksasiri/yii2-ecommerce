<?php
namespace common\components;

use yii\filters\AccessRule as MyAccess;
class AccessRule extends MyAccess {
    protected function matchRole($user) {
        if(empty($this->roles)){
            return true;
        }
        
        foreach($this->roles as $role){
            if($role === '?'){
                if($user->getIsGuest()){
                    return true;
                }
            }elseif($role === '@'){
                if(!$user->getIsGuest()){
                    return true;
                }
            }elseif(!$user->getIsGuest() && $role === $user->identity->role){
                return true;
            }
        }
        
        return false;
    }
}
