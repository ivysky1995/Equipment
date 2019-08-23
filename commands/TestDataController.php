<?php


namespace app\commands;

use app\models\Category;
use app\models\Employee;
use app\models\Equipment;
use app\models\SystemUser;
use yii\console\Controller;
use yii\console\ExitCode;


class TestDataController extends Controller
{
    /**
     * Syntax
     * php yii test-data/init-category
     */
    
    public function actionInitCategory()
    {   
        $categories = [
            'ノート型PC',
            'デックストップ',
            'スピーカー',
            'モニター',
            '携帯電話',
            
        ];
        /**
         * Khi dung ham findOneCreateNew nhớ để ý là $condition phải là 1 cái khác nhau giữa các thành phần 
         * 
         */
        foreach ($categories as $categoryName)
        {
            $category = Category::findOneCreateNew([
                'name'=>$categoryName,
            ]);
            $category->data_status = Category::DATA_STATUS_NOMAL;
            $category->saveThrowError();
        }

        
    }
    /**
     * Systax
     * ./yii test-data/init-employee
     */
    public function actionInitEmployee()
    {
        for ($i = 1; $i <= 50; $i++) {
            $employeeNo = "$i";
            $employeeName = "Employee $i";
            $employee = Employee::findOneCreateNew([
                'employee_no' => $employeeNo,
            ]);
            $employee->name = $employeeName;
            $employee->data_status = Employee::DATA_STATUS_NOMAL;
            $employee->working_status = Employee::WORKING_STATUS_NORMAL;
            $employee->saveThrowError();
        }
    }
    /**
     * Systax
     * ./yii test-data/init-system-user
     */
    public function actionInitSystemUser()
    {   
        for ($i = 0; $i <= 1; $i++) {
            $systemUser = SystemUser::findOneCreateNew(['username' => "User $i"]);
            $systemUser->email = "user$i@example.com";
            $systemUser->privileges = $i % 2 + 1;
            $systemUser->data_status = SystemUser::DATA_STATUS_DELETED;
            $systemUser->saveThrowError();
        }

        
    }
    /**
     * Systax
     * ./yii test-data/init-equipment
     */
    public function actionInitEquipment()
    {
        for ($i = 1;$i<= 50;$i++){
            $equipment = Equipment::findOneCreateNew([
                'code' =>"CODE $i",
            ]);
            $equipment->category_id = 1;
            $equipment->name = "MacBook Pro $i";
            $equipment->model_number = "Model $i";
            $equipment->serial_number = "Serial $i";
            $equipment->specification = "specification $i";
            $equipment->accessory = "accessory $i";
            $equipment->remarks = "remarks $i";
            $equipment->buy_date = "2019/08/" . ($i % 28 + 1);
            $equipment->payment_amount = 10000 + $i;
            $equipment->equipment_status = Equipment::EQUIPMENT_STATUS_NORMAL;
            // $employee->data_status = Employee::DATA_STATUS_NORMAL;
            $equipment->saveThrowError();
        }
    }

}
