<?php if (isset($data)) { ?>

    <h2><?php echo $data['title']; ?></h2>

    <div class="row">
        <div class="col-md-6">
            <?php echo date('d-m-Y H:i:s', $data['created']); ?>
        </div>
        <div class="col-md-6">
            <p>Автор: <?php echo $data['user_name']; ?></p>
        </div>
    </div>

    <div class="row col-md-12">
        <?php echo $data['text']; ?><br>
    </div>

    <div class="row col-md-12">
        <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/guestbook" class="btn btn-success">Вернуться</a>
    </div>
<?php } else { ?>
    <p>Похоже, что, что-то пошло не так...</p>
<?php } ?>