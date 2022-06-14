<?php

namespace Levelup\App\Models;

class MailingList extends Common {


    public function getEmails() {

        $connection = $this->dbConnect();

        $entries = $this->getAll('mailing_list');

    }
    
}