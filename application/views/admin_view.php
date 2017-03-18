<script type='text/javascript'>

    $(document).ready(function () {

        $(".action").click(function () {

            if (!confirm('Вы уверены?')) return false;

            var messageId = $(this).data("id");
            var status = $(this).data("status");

            $.ajax({
                method: "POST",
                url: "/admin/update",
                data: {messageId: messageId, status: status},
                dataType: 'json',
                success: function (data) {
                    location.reload();
                },
                error: function () {
                    alert('Ошибка');
                }
            });
        });

    });
</script>

<h2>Админка</h2>

<?php if (!empty($data['error'])) {?>
    <div class="row error">
        <ul>
            <?php foreach ($data['error'] as $item){ ?>
                <li><?php foreach ($item as $key => $value){ echo $value; } ?></li>
            <?php } ?>
        </ul>
    </div>
<?php } ?>

<table class="table table-striped">
    <thead>
    <tr>
        <th>Дата добавления</th>
        <th>Имя</th>
        <th>E-mail</th>
        <th>Заголовок</th>
        <th>Сообщение</th>
        <th></th>
    </tr>
    </thead>
    <tbody>

    <?php
    if (!empty($data['items'])) {
        foreach ($data['items'] as $item) { ?>
            <tr>
                <td><?php echo date('d-m-Y H:i:s', $item['created']); ?></td>
                <td><?php echo $item['user_name']; ?></td>
                <td><?php echo $item['email']; ?></td>
                <td><?php echo $item['title']; ?></td>
                <td><?php echo $item['text']; ?></td>

                <?php if ($item['activity'] == '1'){ ?>
                    <td><a data-id="<?php echo $item['id']; ?>" data-status="0" class="btn btn-danger action">Отменить</a></td>
                <?php } else { ?>
                    <td><a data-id="<?php echo $item['id']; ?>" data-status="1" class="btn btn-success action">Утвердить</a></td>
                <?php } ?>
            </tr>
        <?php }
    } else { ?>

        <tr>
            <td colspan="5">В гостевой книге пока еще нет сообщений.</td>
        </tr>

    <?php } ?>

    </tbody>
</table>