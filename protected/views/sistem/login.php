<div class="login-box">
    <div class="login-logo">
        <a href="<?= Yii::app()->baseUrl ?>"><b>Ahad</b>SDM</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?php
        $form = $this->beginWidget('CActiveForm', [
            'id' => 'login-form',
            //'enableClientValidation' => true,
            'clientOptions' => [
                'validateOnSubmit' => true,
            //'inputContainer' => '.input'
            ],
        ]);
        ?>
        <div class="form-group has-feedback">
            <?php echo $form->textField($model, 'username', ['placeholder' => 'Nama User', 'class' => 'form-control', 'accesskey' => 'n', 'autofocus' => 'autofocus', 'autocomplete' => 'off']); ?>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <?php echo $form->error($model, 'username', ['class' => 'bg-red']); ?>
        </div>

        <div class="form-group has-feedback">
            <?php echo $form->passwordField($model, 'password', ['placeholder' => 'Password', 'class' => 'form-control', 'accesskey' => 'p', 'autocomplete' => 'off']); ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <?php echo $form->error($model, 'password', ['class' => 'bg-red']); ?>
        </div>

        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox"> Remember Me
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
            <!-- /.col -->
        </div>
        <?php $this->endWidget(); ?>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?= Yii::app()->theme->baseUrl; ?>/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= Yii::app()->theme->baseUrl; ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?= Yii::app()->theme->baseUrl; ?>/plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>