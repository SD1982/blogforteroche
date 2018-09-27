<?php

require_once("model/Manager.php");

class MembersManager extends Manager
{

    public function createUsersAccount($userPseudo, $hashedPass)
    {
        $db = $this->dbConnect();
        $newMember = $db->prepare('INSERT INTO members(pseudo, pass, role) VALUES(?, ?, "member")');
        $newMember->execute(array($userPseudo, $hashedPass));
    }

    public function checkAdminPassword($pseudo)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT pass FROM members WHERE pseudo= :thisPseudo AND role="admin"');
        $req->execute(array(
            'thisPseudo' => $pseudo
        ));
        $hashedPass = $req->fetch();
        return $hashedPass['pass'];
    }
}
