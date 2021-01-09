<?php

use yii\helpers\html;
use yii\widgets\ActiveForm;
$this->title = 'YII 2 CRUD Application';
?>
<div class="site-index">

    <h1>Create Pet</h1>
 
    <div class="body-content">
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <h5><span style="color:red">id</span>: <?php echo $pet->id_pets?></h5>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <h5><span style="color:red">Name</span>: <?php echo $pet->name?></h5>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <h5><span style="color:red">Age</span>: <?php echo $pet->age?></h5>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <h5><span style="color:red">Weight</span>: <?php echo $pet->weight?></h5>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <h5><span style="color:red">id_types</span>: <?php echo $pet->id_types?></h5>
            </li>
        </ul>
        <div class="rows">
            <div class="col-lg-3">
                <a href=<?php echo yii::$app->homeUrl;?> class="btn btn-primary">Go Back</a>
            </div>
        </div>
    </div>
</div>
