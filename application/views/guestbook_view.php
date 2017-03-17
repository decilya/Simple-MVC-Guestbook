<h2>Гостевая книга</h2>

<?php if (!empty($data['error'])) {?>
    <div class="row error">
        <ul>
            <?php foreach ($data['error'] as $item){ ?>
                <li><?php foreach ($item as $key => $value){ echo $value; } ?></li>
            <?php } ?>
        </ul>
    </div>
<?php } ?>


<form method="post">
    <h3>Оставить сообщение:</h3>
    <div class="form-group">
        <label for="inputName">Ваше имя:</label>
        <input value='<?php if (isset($data['post']['user_name'])){ echo $data['post']['user_name']; } ?>' type="text" class="form-control" name="post[user_name]" id="inputName" placeholder="Введите Ваше имя">
    </div>
    <div class="form-group">
        <label for="inputEmail">Адрес email:</label>
        <input value='<?php if (isset($data['post']['email'])){ echo $data['post']['email']; } ?>' type="email" class="form-control" name="post[email]" id="inputEmail" placeholder="Введите email">
    </div>
    <div class="form-group">
        <label for="inputTitle">Заголовок:</label>
        <input value='<?php if (isset($data['post']['title'])){ echo $data['post']['title']; } ?>' type="text" class="form-control" name="post[title]" id="inputTitle" placeholder="Введите заголовок">
    </div>
    <div class="form-group">
        <label for="textarea">Сообщение:</label>
        <textarea name="post[text]" id="textarea" class="form-control"><?php if (isset($data['post']['text'])){ echo $data['post']['text']; } ?></textarea>
    </div>
    <button type="submit" class="btn btn-default">Отправить</button>
</form>


<h3>Список всех сообщений:</h3>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Дата добавления</th>
        <th>Имя</th>
        <th>E-mail</th>
        <th>Заголовок</th>
        <th>Сообщение</th>
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
            </tr>
        <?php }
    } else { ?>

        <tr>
            <td colspan="5">В гостевой книге пока еще нет сообщений.</td>
        </tr>

    <?php } ?>

    </tbody>
</table>
