<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string $name
 * @property int $data_status
 * @property string $employee_no
 * @property int $working_status
 *
 * @property LendingHistory[] $lendingHistories
 */
class Employee extends BaseAppModel
{
    /**
     * {@inheritdoc}
     */
    const WORKING_STATUS_NORMAL = 1;
    const WORKING_STATUS_RETIRE = 2;
    
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['data_status', 'working_status'], 'default', 'value' => null],
            [['data_status', 'working_status'], 'integer'],
            [['name', 'employee_no'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'data_status' => Yii::t('app', 'Data Status'),
            'employee_no' => Yii::t('app', 'Employee No'),
            'working_status' => Yii::t('app', 'Working Status'),
            'dataStatusStr'=>'Data Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLendingHistories()
    {
        return $this->hasMany(LendingHistory::className(), ['employee_id' => 'id']);
    }
    
    public function getEquipment(){
        return $this->hasMany(Equipment::className(), ['id'=>'equipment_id'])
                   ->via('lendingHistories');
    }
    public static function WorkingStatusOptionArr(){
        return [
            self::WORKING_STATUS_NORMAL =>'Nomal',
            self::WORKING_STATUS_RETIRE =>'Retire',
        ];
    }
            
    public function getWorkingStatusStr(){
        return ArrayHelper::getValue(self::WorkingStatusOptionArr(), $this->working_status);
        
    }
}
