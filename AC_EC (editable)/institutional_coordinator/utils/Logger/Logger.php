<?php
include_once("../../config.php");
class ActivityLogger
{

    private $dbConn;

    protected function __construct()
    {
        global $servername, $username, $port, $password, $dbname;
        $this->dbConn = new mysqli($servername, $username, $password, $dbname, $port);
    }

    function __call($name, $arguments)
    {
        if ($name == 'createLogEntry') {

            switch (count($arguments)) {
                case 4:
                    $this->createLogEntry($arguments[0], $arguments[1], $arguments[2], $arguments[3]);
                case 5:
                    $this->createLogEntryWithAffectedUser($arguments[0], $arguments[1], $arguments[2], $arguments[3], $arguments[4]);
            }
        }
    }



    private final function createLogEntry($performing_user, $page_affected, $operation_performed, $status)
    {
        $sql = "insert into activity_log(performing_user,page_affected,operation_performed,status) 
                values ('$performing_user' , '$page_affected','$operation_performed' , '$status')";
        $this->dbConn->query($sql);
    }

    private final function createLogEntryWithAffectedUser($performing_user, $page_affected, $operation_performed, $status, $affected_user)
    {
        $sql = "insert into activity_log(performing_user,page_affected,affected_user,operation_performed,status) 
                values ('$performing_user' , '$page_affected','$affected_user','$operation_performed' , '$status')";
        $this->dbConn->query($sql);
    }
}
