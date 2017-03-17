<?php

class Model_Admin extends DB
{
    private $tabel = 'guestbook';

    public function getAllGuestbook()
    {
        $sql = "SELECT * FROM `" . $this->tabel . "`";
        $data = $this->query($sql);

        return $data;
    }

    public function update($messageId, $status){
        $sql = "UPDATE `guestbook` SET `activity`='$status' WHERE `id`='$messageId'";

        if ($this->query($sql)){
            return true;
        } else {
            return false;
        }
    }
}
