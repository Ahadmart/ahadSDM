<div class="input-group">
    <select class="form-control" id="select-item">
        <?php
        // render _authitem_opt ;
        $this->renderPartial('../authitem/_authitem_opt', [
            'authItem' => $authItem
        ]);
        ?>
    </select>
    <span class="input-group-btn">
        <a href="#" id="tombol-assign" class="btn btn-info btn-flat">Assign</a>
    </span>
</div>


<script>
    $("#tombol-assign").click(function () {
        console.log(jQuery("#select-item").val());
        dataString = 'item=' + jQuery("#select-item").val();
        $.fn.yiiGridView.update('auth-assigned-grid', {
            type: 'POST',
            data: dataString,
            url: "<?php echo $this->createUrl('assign', ['userid' => $user->id]); ?>",
            success: function () {
                $.fn.yiiGridView.update('auth-assigned-grid');
                updateItemOpt();
            }
        });
        return false;
    });
    function updateItemOpt() {
        $("#select-item").load("<?php echo $this->createUrl('listauthitem', ['userid' => $user->id]); ?>");
    }
</script>