<?php
namespace app\models;
use yii\db\ActiveRecord;
class Pets extends ActiveRecord{
    private $name;
    private $age;
    private $weight;
    private $id_types;

    public function rules()
    {
        return[
            [['name','age','weight','id_types'],'required']
        ];
    }
}
?>