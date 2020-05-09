<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\RiRecipeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Home Inventory Items';
$this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">
    ul.ingred_checkboxes {
        list-style-type: none;
        padding-left: 0px;
    }
    ul.ingred_checkboxes li {
        display: block;
        min-width: 75px;
        max-width: 300px;
        padding: 0 7px 10px 0;
    }
</style>

<div class="ri-recipe-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if ($message) : ?>
        <div class="alert alert-success"><?= $message; ?></div>
    <?php endif; ?>

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <label class="control-label" for="item-title">Ingredients</label>
        <div style="clear: both; height: 7px;"></div>
        <input type="text"
               name="search"
               id="search"
               class="form-control"
               value=""
               placeholder="Search"
               style="width: 80%; display: inline-block;"
               autocorrect="off"
               autocapitalize="off"/>&nbsp;<button class="btn btn-default" id="btnReset" >Reset</button>
    </div>

    <div class="form-group">
        <label class="control-label" for="item-title">Ingredients</label>
        <ul class="ingred_checkboxes">
        <?php foreach ($ingredients as $getIngred) : ?>
            <li class="ingred_list_items" data-title="<?= $getIngred['title_slug']; ?>">
                <input type="checkbox" name="ingredient_id[]" id="ingredient_id[]" value="<?= $getIngred['id']; ?>" <?= ($getIngred['selected'] == "1") ? "CHECKED" : ""; ?>/>&nbsp; <?= $getIngred['title']; ?>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Update', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<script>

    setTimeout(function() {



        $('#recipe_id').change(function() {

            window.location.href = '/ri-recipe-to-ingredients/index?recipe_id=' + $(this).val();
        })

        $('#search').keyup(function() {
            var val2 = $(this).val();
            $('.ingred_list_items').each(function() {
                $(this).hide();
            })
            $('[data-title*="' + val2 + '"]').each(function() {
                $(this).show();
            })
        });

        $('#btnReset').click(function() {
            $('.ingred_list_items').each(function() {
                $(this).show();
            })
            $('#search').val('');
        })

    }, 3000)
</script>
