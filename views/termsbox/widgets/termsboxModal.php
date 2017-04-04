<?php

use yii\helpers\Url;
use yii\helpers\Html;

\humhub\modules\termsbox\Assets::register($this);

?>

<div class="modal" id="termsboxModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="myModalLabel" class="modal-title"><img src="themes/SafetyNET-Beta/resources/modalicon.png" alt="" height="36" width="36"> <?= Html::encode($title) ?></h4>
            </div>
            <div class="modal-body">
                <p class='help-block'><?= Html::encode($statement) ?></p>
                <div class="termsbox-body">
                    <?php echo humhub\widgets\MarkdownView::widget(['markdown' => $content]); ?>
                </div>
            </div>
            <div class="modal-footer">
                <a id="termsbox-accept" class="btn btn-success" data-ui-loader><?= Yii::t('TermsboxModule.widgets_views_termsboxModal', 'Accept'); ?></a>
                <a class="btn btn-danger" href="<?= Url::to(['/termsbox/index/decline']); ?>" data-ui-loader><?= Yii::t('TermsboxModule.widgets_views_termsboxModal', 'Decline'); ?></a>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

    $(document).ready(function () {

        $('#termsboxModal').modal({
            backdrop: 'static',
            keyboard: false,
            show: true
        });

    });

    $('#termsbox-accept').on('click', function() {
        $.ajax({
            url: '<?= Url::to(['/termsbox/index/accept']) ?>',
            success: function() {
                $('#termsboxModal').modal('hide');
            }
        });
    });

</script>
