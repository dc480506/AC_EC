<?php
include("Logger.php");
class StudentLogger extends ActivityLogger
{
    private static $LoggerInstance;
    public static function getLogger(): StudentLogger
    {
        if (self::$LoggerInstance == null) {
            self::$LoggerInstance = new StudentLogger();
        }
        return self::$LoggerInstance;
    }

    public function studentModified($performing_user, $affectedUser, $program)
    {
        $pageAffected = "$program student records";
        $operationPerformed = "UPDATE";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "updated details for $affectedUser", $affectedUser);
    }

    public function studentDeleted($performing_user, $affectedUser, $program)
    {
        $pageAffected = "$program student records";
        $operationPerformed = "DELETE";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "$affectedUser record was deleted", $affectedUser);
    }


    public function studentInserted($performing_user, $affectedUser, $status)
    {
        $pageAffected = "studentRecords";
        $operationPerformed = "INSERT";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "Student record was inserted", $affectedUser);
    }

    public function studentsRecordsViewed($performing_user, $pageAffected, $affectedUser = '')
    {
        $operationPerformed = "READ";
        if ($affectedUser == '') {
            $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "$pageAffected page was viewed");
        } else {
            $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "$pageAffected page was viewed", $affectedUser);
        }
    }

    public function studentMarksDeleted($performing_user, $affectedUser)
    {
        $pageAffected = "student marks";
        $operationPerformed = "DELETE";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "$affectedUser marks record was deleted", $affectedUser);
    }

    public function studentMarksUpdated($performing_user, $affectedUser, $status)
    {
        $pageAffected = "student marks";
        $operationPerformed = "UPDATE";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, $status, $affectedUser);
    }

    public function formFill($performing_user, $form_name)
    {
        $pageAffected = $form_name;
        $operationPerformed = "INSERT";
        $status = "$form_name filled by $performing_user";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, $status);
    }

    public function formUpdate($performing_user, $form_name)
    {
        $pageAffected = $form_name;
        $operationPerformed = "UPDATE";
        $status = "$form_name edited by $performing_user";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, $status);
    }
}
