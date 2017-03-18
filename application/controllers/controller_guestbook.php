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

        if ((!empty($_REQUEST['post']))||(isset($_POST['captcha']))) {

            $captcha = false;

            if ($_POST['captcha'] == $_SESSION['cap_code']) {
                $captcha = true;
            } else {
                $data['error'] = [[
                    'captcha' => 'Капча введена не верно!',
                ]];
            }

            $post = $_REQUEST['post'];
            $data['post'] = $post;

            if ((!empty($_REQUEST['post']))&&($captcha)) {

                $error = $this->model->validate($post);

                if (empty($error) && ($captcha)) {
                    $this->model->create($post, false);
                    $data['post'] = array();
                    $data['success'] = 'Сообщение успешно отправлено';
                } else {
                    $data['error'] = $error;
                }
            }
        }

        $data['items'] = $this->model->getAllActiveGuestbook();

        $this->view->generate('guestbook_view.php', 'template_view.php', $data);
    }

    function action_post(){
        $postId = $_REQUEST['id'];

        $data = $this->model->getOnePost($postId);

        $this->view->generate('one_post_view.php', 'template_view.php', $data);
    }


}