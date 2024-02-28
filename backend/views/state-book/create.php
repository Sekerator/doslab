<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\StateBook $model */

$this->title = 'Добавить состояние';
$this->params['breadcrumbs'][] = ['label' => 'Состояние книг', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="state-book-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
