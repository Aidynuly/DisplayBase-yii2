<?php
namespace app\models;
use yii\db\ActiveRecord;
class Types extends ActiveRecord{
    private $id_type;
    private $name;

    public function rules()
    {
        return[
            [['id_type','name'],'required']
        ];
    }
}
?>