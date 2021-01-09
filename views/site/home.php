<?php

use yii\helpers\html;

$this->title = 'YII 2 CRUD Application';
?>
<div class="site-index">

    <?php if(yii::$app->session->hasFlash('message')):?>
    <div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?php echo yii::$app->session->getFlash('message');?>
    </div>
<?php endif;?>

    <div class="jumbotron">
        <h1>YII 2 CRUD</h1>        
    </div>
    <div class="row">
        <span><?=Html::a('Create',['/site/create'],['class'=>'btn btn-primary'])?></span>
    </div>
    <div class="body-content">

        <div class="row">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id pets</th>
                        <th scope="col">name</th>
                        <th scope="col">age</th>
                        <th scope="col">weight</th>
                        <th scope="col">Id_types</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(count($pets)>0):?>
                    <?php foreach($pets as $pet): ?>
                    <tr class="table-active">
                        <th scope="row"><?php echo $pet->id_pets;?></th>
                        <td><?php echo $pet->name;?></td>
                        <td><?php echo $pet->age;?></td>
                        <td><?php echo $pet->weight;?></td>
                        <td><?php echo $pet->id_types;?></td>
                        <td>
                            <span><?= Html::a('View',['view','id_pets'=> $pet->id_pets],['class'=>'label label-primary']) ?></span>
                            <span><?= Html::a('Update',['update','id_pets'=> $pet->id_pets],['class'=>'label label-default']) ?></span>
                            <span><?= Html::a('Delete',['delete','id_pets'=> $pet->id_pets],['class'=>'label label-danger']) ?></span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else:?>
                    <tr>
                        <td>No records found!</td>
                    </tr>
                <?php endif;?>
                </tbody>
            </table>

        </div>


       
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id type</th>
                        <th scope="col">name</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(count($types)>0):?>
                    <?php foreach($types as $type): ?>
                    <tr class="table-active">
                        <th scope="row"><?php echo $type->id_type;?></th>
                        <td><?php echo $type->name;?></td>
                        
                    </tr>
                    <?php endforeach; ?>
                <?php else:?>
                    <tr>
                        <td>No records found!</td>
                    </tr>
                <?php endif;?>
                </tbody>
            </table>

        </div>
        
    </div>
</div>
