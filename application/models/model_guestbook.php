<?php

class Model_Guestbook extends DB
{
    private $tabel = 'guestbook';

    public function getAllActiveGuestbook()
    {
        $sql = "SELECT * FROM `" . $this->tabel . "` WHERE `activity`='1'";
        $this->query($sql);

        $result = array();

        while ($this->next()) {
            $result[] = [
                'id' => $this->val('id'),
                'created' => $this->val('created'),
                'user_name' => $this->val('user_name'),
                'email' => $this->val('email'),
                'title' => $this->val('title'),
                'text' => $this->val('text'),
            ];
        }

        return $result;
    }

    public function validate($post = array())
    {
        $error = array();

        if (empty($post['user_name'])) {
            $error[] = [
                'user_name' => 'Имя не может быть пустым',
            ];
        }

        if (empty($post['email'])) {
            $error[] = [
                'email' => 'email не может быть пустым!',
            ];
        }

        if (empty($post['title'])) {
            $error[] = [
                'title' => 'Заголовок не может быть пустым!',
            ];
        }

        if (strlen($post['text']) < 25) {
            $error[] = [
                'text' => 'Сообщение не может быть короче 25 символов!',
            ];
        }

        if (empty($error)) {
            return false;
        } else {
            return $error;
        }

    }

    public function create($post, $validate = true)
    {
        if ($validate) {
            if ($this->validate($post) != false) {
                return false;
            }
        }

        $created = time();
        $user_name = mysqli_real_escape_string($this->link, $post['user_name']);
        $email = mysqli_real_escape_string($this->link, $post['email']);
        $title = mysqli_real_escape_string($this->link, $post['title']);
        $text = mysqli_real_escape_string($this->link, $post['text']);
        $activity = 0;

        $sql = "INSERT INTO `guestbook` (`id`, `created`, `user_name`, `email`, `title`, `text`, `activity`) VALUES (NULL, '$created', '$user_name', '$email', '$title', '$text', '$activity')";

        $result = $this->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }


}
