<?php

class Model_Admin extends DB
{
    private $tabel = 'guestbook';

    public function getAllGuestbook()
    {
        $sql = "SELECT * FROM `" . $this->tabel . "` ORDER BY `created` DESC";
        $data = $this->query($sql);

        return $data;
    }

    public function update($messageId, $status)
    {
        $sql = "UPDATE `guestbook` SET `activity`='$status' WHERE `id`='$messageId'";

        if ($this->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
}
