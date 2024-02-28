<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ReturnBook $model */

$this->title = 'Создать операцию по возврату';
$this->params['breadcrumbs'][] = ['label' => 'Возврат книг', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="return-book-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
