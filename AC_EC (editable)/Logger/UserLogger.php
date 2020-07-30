<?php
include("Logger.php");
class UserLogger extends ActivityLogger
{
    private static $LoggerInstance;
    private function __construct()
    {
        parent::__construct();
    }
    public static function getLogger(): UserLogger
    {
        if (self::$LoggerInstance == null) {
            self::$LoggerInstance = new UserLogger();
        }
        return self::$LoggerInstance;
    }

    public function loginLog($performing_user, $role)
    {
        $pageAffected = "$role dashboard";
        $operationPerformed = "LOGIN";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "user logged in");
    }
    public function invalidLogin($performing_user)
    {
        $pageAffected = "login";
        $operationPerformed = "LOGIN";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "invalid login due to incorrect password");
    }
}
