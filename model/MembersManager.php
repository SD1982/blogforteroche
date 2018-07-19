<?php

require_once("model/Manager.php");

class MembersManager extends Manager{
    
    public function createUsersAccount($userPseudo, $hashedPass){
        $db = $this->dbConnect();
        $newMember = $db->prepare ('INSERT INTO members(pseudo, pass, role) VALUES(?, ?, "member")');
        $newMember->execute(array($userPseudo, $hashedPass)); 
    }
    
    public function checkAdminPassword(){
        $db = $this->dbConnect();
        $adminPassword = $db->query('SELECT pass FROM members WHERE pseudo="forteroche"');
        return $adminPassword;
    }
}
