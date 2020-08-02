<?php
include("Logger.php");
class FacultyLogger extends ActivityLogger
{
    private static $LoggerInstance;
    public static function getLogger(): FacultyLogger
    {
        if (self::$LoggerInstance == null) {
            self::$LoggerInstance = new FacultyLogger();
        }
        return self::$LoggerInstance;
    }

    public function facultyModified($performing_user, $affectedUser)
    {
        $pageAffected = "faculty records";
        $operationPerformed = "UPDATE";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "updated details for $affectedUser", $affectedUser);
    }

    public function FacultyDeleted($performing_user, $affectedUser)
    {
        $pageAffected = "faculty records";
        $operationPerformed = "DELETE";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "$affectedUser record was deleted", $affectedUser);
    }

    public function facultyRoleChange($performing_user, $affectedUser, $oldRole, $newRole)
    {
        $pageAffected = "faculty records";
        $operationPerformed = "UPDATE";
        $status = "made $affectedUser $newRole from $oldRole";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, $status, $affectedUser);
    }
    public function facultyInserted($performing_user, $affectedUser)
    {
        $pageAffected = "faculty records";
        $operationPerformed = "INSERT";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "faculty record was inserted", $affectedUser);
    }

    public function facultyRecordsViewed($performing_user, $pageAffected, $affectedUser = '')
    {
        $operationPerformed = "READ";
        if ($affectedUser == '') {
            $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "$pageAffected page was viewed");
        } else {
            $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "$pageAffected page was viewed", $affectedUser);
        }
    }
}
