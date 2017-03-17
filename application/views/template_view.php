<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>

    <title>Тестовое задание</title>

    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-theme.min.css"/>

    <link rel="stylesheet" type="text/css" href="/css/style.css"/>

    <script src="/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/js/jquery-3.1.1.min.js" type="text/javascript"></script>
</head>
<body>

<div class="wrapper container">
    <header>
        <nav role="navigation" class="navbar navbar-default">
            <div class="navbar-header">
                <a href="#" class="navbar-brand"><h1>Simple MVC Guestbook</h1></a>
            </div>
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li <?php if ($content_view == 'main_view.php') { ?> class="active" <?php } ?>>
                        <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>">Задание</a>
                    </li>
                    <li <?php if ($content_view == 'guestbook_view.php') { ?> class="active" <?php } ?>>
                        <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/guestbook">Гостевая книга</a>
                    </li>
                    <li <?php if ($content_view == 'admin_view.php') { ?> class="active" <?php } ?>>
                        <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/admin">Админка</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="row">
        <section class="col-md-12">
            <?php include 'application/views/' . $content_view; ?>
        </section>
    </div>
</div>

<footer class="container">
    <a target="_blank" href="https://github.com/decilya/Simple-MVC-Guestbook">Тестовое задание</a> &copy; decilya 2017</a>
</footer>

</body>
</html>