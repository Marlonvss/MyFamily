<?php

error_reporting(E_ERROR);
session_start();

include './back/services/DataProcesso.php';
include './../back/services/DataProcesso.php';
?>

<script>
    function alteraProcesso(months) {
        $.ajax({
            url: 'back/services/DataProcesso.php',
            type: 'post',
            dataType: 'text',
            data: {
                'months': months,
                'metodo': 'alteraProcesso'
            }
        }).done(function() {
            location.reload();
        });
    }
</script>

<div class="row">
    <div class="col-xs-12">
        <span class="page-title red">
            <h2>
                <i class="fa fa-arrow-circle-o-left clicable" aria-hidden="true" onclick="alteraProcesso(-1)"></i> 
                <?php echo getMesAnoProcesso(); ?> 
                <i class="fa fa-arrow-circle-o-right clicable" aria-hidden="true" onclick="alteraProcesso(1)"></i>
            </h2>
        </span>
    </div>
</div>