<?php
class Admin {

    public function read() {
        global $conn;
        $sql = $conn->prepare("SELECT * FROM admins");
        $sql->execute();
        while($row = $sql->fetch(PDO::FETCH_ASSOC)) : 
            $result[] = $row;
            $bind = new Assign;
            $bind->Id            = $row["adm_id"];
            $bind->name          = $row["adm_name"];
            $bind->email         = $row["adm_email"];
            $bind->pswd          = $row["adm_password"];
            $bind->picture       = $row["adm_picture"];
            $bind->birthdate     = $row["adm_birthdate"];
            $bind->sex           = $row["adm_sex"];
            $bind->registered    = $row["adm_registered"];
            $bind->update        = $row["adm_lastupdate"];
            $bind->role          = $row["adm_role"];
            $bind->activationkey = $row["activation_key"];
            $bind->token         = $row["adm_token"];
            $bind->status        = $row["adm_status"];
            $list[] = $bind;
        endwhile;
        return isset($result) ? $list : NULL;
        $sql = NULL;
    }

    public function current($column) {
        global $conn;
        $admId = isset($_SESSION['adm_id']) ? $_SESSION['adm_id'] : NULL;
        $sql = $conn->prepare("SELECT $column FROM admins WHERE adm_id = ?");
        $sql->execute([$admId]);
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        return $row[$column];
        $sql = NULL;
    }

    public function Id() {
        return $this->current('adm_id');
    }

    public function name() {
        return $this->current('adm_name');
    }

    public function email() {
        return $this->current('adm_email');
    }

    public function pswd() {
        return $this->current('adm_password');
    }

    public function picture() {
        return $this->current('adm_picture');
    }

    public function birthdate() {
        return $this->current('adm_birthdate');
    }

    public function sex() {
        return $this->current('adm_sex');
    }

    public function registered() {
        return $this->current('adm_registered');
    }

    public function update() {
        return $this->current('adm_lastupdate');
    }

    public function role() {
        return $this->current('adm_role');
    }

    public function activationkey() {
        return $this->current('activation_key');
    }

    public function token() {
        return $this->current('adm_token');
    }

    public function status() {
        return $this->current('adm_status');
    }

}