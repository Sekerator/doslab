<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\SaleBook $model */

$this->title = 'Создать операцию по выдаче';
$this->params['breadcrumbs'][] = ['label' => 'Выдача книг', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sale-book-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
