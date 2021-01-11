<?php

namespace App\Services;

class AutoIncrementServices 
{
    public function handleIncrement($params)
    {
        if ($params['data'] === 0) {
            $newID = $params['prefix'].'0001';
            return $newID; 
        }else{
            $initID = substr($params['data'], $params['length'], $params['length']+1);
            $initID++;
            $newID = $params['prefix'].sprintf('%04s', $initID);
            return $newID;
        }
    }

    public function handleNIS($params)
    {
        if ($params['data'] === 0) {
            $newID = $params['nsm'].$params['thn_masuk'].'0001';
            return $newID;
        }else{
            $initID = substr($params['data'], $params['length'], $params['length']+1);
            $initID++;
            $newID = $params['nsm'].$params['thn_masuk'].sprintf('%04s', $initID);
            return $newID;
        }
    }
}
