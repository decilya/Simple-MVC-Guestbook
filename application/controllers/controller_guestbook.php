<?php

class Controller_Guestbook extends Controller
{

    function __construct()
    {
        $this->model = new Model_Guestbook();
        $this->view = new View();
    }

    function action_index()
    {
        $error = array();

        if (!empty($_REQUEST['post'])) {

            $post = $_REQUEST['post'];
            $error = $this->model->validate($post);

            if (empty($error)) {
                echo "Ошибок нет, можно сохронять.";
                $this->model->create($post, false);
                $data['post'] = $post;
            } else {
                $data['post'] = $post;
            }
        }
        $data['items'] = $this->model->getAllActiveGuestbook();

        $data['error'] = $error;

        $this->view->generate('guestbook_view.php', 'template_view.php', $data);
    }

    function action_test()
    {
        $data = $this->model->getData();
        $this->view->generate('main_view.php', 'template_view.php', $data);
    }
}