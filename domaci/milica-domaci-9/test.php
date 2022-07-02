<?php

class LoginException extends \Exception {

}

class DatabaseException extends \Exception {

}

class Database {

    public function connect() {
        
        throw new DatabaseException();
    }
}

class Security {

    public function login($username, $password): bool {

        // throw new LoginException();

        if(!$this->checkUsername($username)) {
            return false;
        }

        if(!$this->checkPassword($password)) {
            return false;
        }

        return true;
    }

    protected function checkUsername($username) {

        // login logic
        $db = new Database();
        $db->connect();

        // logic to check username from DB
        return true;

    }

    protected function checkPassword($password) {

        // login logic
        $db = new Database();
        $db->connect();

        // logic to check password from DB
        return true;
    }
}


try {

    // do some actions
    $security = new Security();
    var_dump($security->login('milos', '1234'));

} catch(DatabaseException $exception) {
    echo "Database exception has occurred";
} catch(LoginException $exception) {
    echo "Login exception has occurred";
} catch(\Exception $exception) {
    // display error
    echo $exception->getMessage();
}