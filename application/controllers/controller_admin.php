<?php

class Controller_Admin extends Controller
{

    function __construct()
    {
        $this->model = new Model_Admin();
        $this->view = new View();
    }

    function action_index()
    {
        $error = array();

        if (!empty($_REQUEST['post'])) {

            $post = $_REQUEST['post'];
            $error = $this->model->validate($post);

            if (empty($error)) {
                $this->model->create($post, false);
                $data['post'] = $post;
            } else {
                $data['post'] = $post;
            }
        }
        $data['items'] = $this->model->getAllGuestbook();

        $data['error'] = $error;

        $this->view->generate('admin_view.php', 'template_view.php', $data);
    }

    function action_update(){

        $messageId = $_REQUEST['messageId'];
        $status = $_REQUEST['status'];

        $result = $this->model->update($messageId, $status);

        if ($result){
            echo 1;
        }
    }

}