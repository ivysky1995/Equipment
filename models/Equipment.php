<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "equipment".
 *
 * @property int $id
 * @property string $code
 * @property int $category_id
 * @property string $name
 * @property string $model_number
 * @property string $serial_number
 * @property string $specification
 * @property string $accessory
 * @property string $remarks
 * @property string $buy_date
 * @property int $payment_amount
 * @property int $equipment_status
 *
 * @property LendingHistory[] $lendingHistories
 */
class Equipment extends BaseAppModel
{
    /**
     * {@inheritdoc}
     */

    const TYPE_PC = 1;
    const TYPE_DESKOP = 2;
    const TYPE_SPEAKER = 3;
    const TYPE_MONITOR = 4;
    const TYPE_MOBILE = 5;

    const EQUIPMENT_STATUS_NORMAL = 1;
    const EQUIPMENT_STATUS_REPAIR = 2;
    const EQUIPMENT_STATUS_BROKEN = 3;

    public static function tableName()
    {
        return 'equipment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'name'], 'required'],
            [['category_id', 'payment_amount', 'equipment_status'], 'default', 'value' => null],
            [['category_id', 'payment_amount', 'equipment_status'], 'integer'],
            [['accessory', 'remarks'], 'string'],
            [['buy_date'], 'safe'],
            [['code', 'name', 'model_number', 'serial_number', 'specification'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Code'),
            'category_id' => Yii::t('app', 'Category ID'),
            'name' => Yii::t('app', 'Name'),
            'model_number' => Yii::t('app', 'Model Number'),
            'serial_number' => Yii::t('app', 'Serial Number'),
            'specification' => Yii::t('app', 'Specification'),
            'accessory' => Yii::t('app', 'Accessory'),
            'remarks' => Yii::t('app', 'Remarks'),
            'buy_date' => Yii::t('app', 'Buy Date'),
            'payment_amount' => Yii::t('app', 'Payment Amount'),
            'equipment_status' => Yii::t('app', 'Equipment Status'),
            'TypeStr'=>'Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLendingHistories()
    {
        return $this->hasMany(LendingHistory::className(), ['equipment_id' => 'id']);
    }
     public static function typeOptionArr(){
        return [
            self::TYPE_PC => 'ノート型PC',
            self::TYPE_DESKOP =>'デックストップ',

            self::TYPE_SPEAKER =>'スピーカー',
            self::TYPE_MONITOR =>'モニター',
            self::TYPE_MOBILE =>'モバイル',
            
            
        ];
    }
    public function getTypeStr(){
        return ArrayHelper::getValue(self::typeOptionArr(),$this->category_id);
    }
    public function getEmployees()
    {
        return $this->hasMany(Employee::className(),['id'=>'employee_id'])
                ->via('lendingHistories');
    }
    public static function EquipmentStatusOptionArr(){
        return [
            self::EQUIPMENT_STATUS_NORMAL =>'Nomal',
            self::EQUIPMENT_STATUS_REPAIR =>'Repair',
            self::EQUIPMENT_STATUS_BROKEN =>'Broken',
        ];
    }
            
    public function getEquipmentStatusStr(){
        return ArrayHelper::getValue(self::EquipmentStatusOptionArr(), $this->equipment_status);
        
    }
    
    
}
