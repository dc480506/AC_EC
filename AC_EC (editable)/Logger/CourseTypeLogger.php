<?php
include("Logger.php");
class CourseTypeLogger extends ActivityLogger
{
    private static $LoggerInstance;
    public static function getLogger(): CourseTypeLogger
    {
        if (self::$LoggerInstance == null) {
            self::$LoggerInstance = new CourseTypeLogger();
        }
        return self::$LoggerInstance;
    }

// -----------------
    public function courseTypeModified($performing_user, $affectedCourseType)
    {
        $pageAffected = "Course type records";
        $operationPerformed = "UPDATE";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "updated details for $affectedCourseType type", $affectedCourseType);
    }
    // $affectedCourseType=$course_type

    public function courseTypeDeleted($performing_user, $affectedCourseType)
    {
        $pageAffected = "Course type records";
        $operationPerformed = "DELETE";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "$affectedCourseType course type was deleted", $affectedCourseType);
    }


    public function courseTypeInserted($performing_user, $affectedCourseType)
    {
        $pageAffected = "Course type records";
        $operationPerformed = "INSERT";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "$affectedCourseType course type was inserted", $affectedCourseType);
    }

    public function coursesTypeRecordsViewed($performing_user)
    {
        $operationPerformed = "READ";
        $pageAffected = "Course type records";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "$pageAffected  was viewed");
  
    }
}