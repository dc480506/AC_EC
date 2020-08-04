<?php
include("Logger.php");
class FormLogger extends ActivityLogger
{
    private static $LoggerInstance;
    public static function getLogger(): FormLogger
    {
        if (self::$LoggerInstance == null) {
            self::$LoggerInstance = new FormLogger();
        }
        return self::$LoggerInstance;
    }

    public function formModified($performing_user, $formId)
    {
        $pageAffected = "forms";
        $operationPerformed = "UPDATE";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "updated details for form ID- $formId");
    }

    public function formDeleted($performing_user, $formId)
    {
        $pageAffected = "forms";
        $operationPerformed = "DELETE";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "form ID-$formId deleted");
    }


    public function formCreated($performing_user, $formType)
    {
        $pageAffected = "forms";
        $operationPerformed = "INSERT";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "form for $formType created");
    }

    public function formRecordsViewed($performing_user, $affectedUser = '')
    {
        $operationPerformed = "READ";
        $pageAffected = "forms";
        if ($affectedUser == '') {
            $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "$pageAffected page was viewed");
        } else {
            $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "$pageAffected page was viewed", $affectedUser);
        }
    }
}
