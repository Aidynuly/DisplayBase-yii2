<?php

use yii\helpers\html;
use yii\widgets\ActiveForm;
$this->title = 'YII 2 CRUD Application';
?>
<div class="site-index">

    <h1>Create Pet</h1>
 
    <div class="body-content">
        <?php
            $form=ActiveForm::begin()?>


        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <?= $form->field($pet,'name');?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <?= $form->field($pet,'age');?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <?= $form->field($pet,'weight');?>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                <?php $items=['1'=>'1-Собака','2'=>'2-Кот','3'=>'3-Попугай',]; ?>
                    <?= $form->field($pet,'id_types')->dropDownList($items,['promt'=>'Select']);?>
                </div>
            </div>
        </div>
        

        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">

                    <div class="col-lg-3">
                        <?=Html::submitButton('Create Pet',['class'=>'btn btn-primary']);?>
                    </div>

                    <div class="col-lg-3">
                        <a href=<?php echo yii::$app->homeUrl;?> class="btn btn-primary">Go Back</a>
                    </div>
                
                </div>
            </div>
        </div>

        <?php ActiveForm::end() ?>
    </div>
</div>
