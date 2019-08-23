<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

class BaseAppModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    const DATA_STATUS_NOMAL = 1;
    const DATA_STATUS_DELETED = 2;

    public static function DataStatusOptionArr(){
        return [
            self::DATA_STATUS_NOMAL =>'Nomal',
            self::DATA_STATUS_DELETED =>'Deleted',
        ];
    }
            
    public function getDataStatusStr(){
        return ArrayHelper::getValue(self::DataStatusOptionArr(), $this->data_status);
        
    }

    /**
     * Create Model findOneCreateNew for Command Controller 
     * Nếu có thì create theo điều kiện đó không có thì không create
     * 
     */
    public function getErrorMessages($attribute = NULL)
    {
        if ($attribute === NULL) {
            $attribute = $this->attributes();
        }
        if (!is_array($attribute)) {
            $attribute = array($attribute);
        }
        $errors = array();
        foreach ($attribute as $attr) {
            if ($this->hasErrors($attr)) {
                $errors = array_merge($errors, array_values($this->getErrors($attr)));
            }
        }
        return $errors;
    }
    public function saveThrowError()
    {
      if (!$this->save()) {
        throw new Exception("Error saving " . join("\n", $this->getErrorMessages()));
      }
    }
    public static function findOneCreateNew($condition,$saveDb = FALSE)
    {
        $result = static::findOne($condition);
        if(!$result){
            $result = \Yii::createObject(static::className());
            \Yii::configure($result, $condition);
            if ($saveDb){
                $result->saveThrowError();
        
            }
        }
        return $result;
    }
}