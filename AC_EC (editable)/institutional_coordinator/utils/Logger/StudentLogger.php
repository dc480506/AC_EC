<?php

class StudentLogger extends ActivityLogger
{
    private static $LoggerInstance;
    protected function getLogger(): ActivityLogger
    {
        if (self::$LoggerInstance == null) {
            parent::__construct();
            self::$LoggerInstance = new ActivityLogger();
        }
        return self::$LoggerInstance;
    }

    public function studentModified($performing_user, $affectedUser, $status)
    {
        $pageAffected = "studentRecords";
        $operationPerformed = "UPDATE";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, $status, $affectedUser);
    }

    public function studentDeleted($performing_user, $affectedUser, $status)
    {
        $pageAffected = "studentRecords";
        $operationPerformed = "DELETE";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "Student record was deleted", $affectedUser);
    }


    public function studentInserted($performing_user, $affectedUser, $status)
    {
        $pageAffected = "studentRecords";
        $operationPerformed = "INSERT";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "Student record was inserted", $affectedUser);
    }

    public function studentsRecordsViewed($performing_user, $pageAffected)
    {
        $operationPerformed = "READ";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "Student record was inserted", $affectedUser);
    }
}
