<?php
include("Logger.php");
class CourseLogger extends ActivityLogger
{
    private static $LoggerInstance;
    public static function getLogger(): CourseLogger
    {
        if (self::$LoggerInstance == null) {
            self::$LoggerInstance = new CourseLogger();
        }
        return self::$LoggerInstance;
    }

// -----------------
    public function courseModified($performing_user, $affectedCourse, $active_status)
    {
        $pageAffected = "$active_status course records";
        $operationPerformed = "UPDATE";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "updated details for $affectedCourse", $affectedCourse);
    }
    // $affectedCourse=$cid.",sem".$sem.",year".$year." of course_type".$course_type;

    public function courseDeleted($performing_user, $affectedCourse, $active_status)
    {
        $pageAffected = "$active_status course records";
        $operationPerformed = "DELETE";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "$affectedCourse record was deleted", $affectedCourse);
    }


    public function courseInserted($performing_user, $affectedCourse, $active_status)
    {
        $pageAffected = "$active_status course records";
        $operationPerformed = "INSERT";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "$affectedCourse record was inserted", $affectedCourse);
    }

    public function coursesRecordsViewed($performing_user,$active_status)
    {
        $operationPerformed = "READ";
        $pageAffected = "$active_status course records";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "$pageAffected  was viewed");
  
    }

// -----------------
    public function addiCoursesRecordsViewed($performing_user,$pageAffected,$affectedCourse)
    {
        $operationPerformed = "READ";
        $pageAffected = "$pageAffected page";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "$pageAffected page was viewed", $affectedCourse);

    }


// -----------------
    public function courseFacultyDeleted($performing_user, $affectedFaculty,$affectedCourse, $active_status)
    {
        $pageAffected = "$active_status course records";
        $operationPerformed = "DELETE";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "faculty $affectedFaculty record was deleted for course $affectedCourse", $affectedCourse);
    }

    public function courseFacultyInserted($performing_user, $affectedFaculty,$affectedCourse, $active_status)
    {
        $pageAffected = "$active_status course records";
        $operationPerformed = "INSERT";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "faculty $affectedFaculty record was added for course $affectedCourse", $affectedCourse);
    }

// -----------------

    public function courseSimilarDeleted($performing_user, $affectedSimilarCourse,$affectedCourse, $active_status)
    {
        $pageAffected = "$active_status course records";
        $operationPerformed = "DELETE";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "Similar course $affectedSimilarCourse record was deleted for course $affectedCourse", $affectedCourse);
    }
    public function courseSimilarInserted($performing_user, $affectedSimilarCourse,$affectedCourse, $active_status)
    {
        $pageAffected = "$active_status course records";
        $operationPerformed = "INSERT";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "Similar course $affectedSimilarCourse record was added for course $affectedCourse", $affectedCourse);
    }

// -----------------
    public function courseSyllabusDeleted($performing_user, $affectedCourse, $active_status)
    {
        $pageAffected = "$active_status course records";
        $operationPerformed = "DELETE";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "$affectedCourse syllabus record was deleted", $affectedCourse);
    }


    public function courseSyllabusInserted($performing_user, $affectedCourse, $active_status)
    {
        $pageAffected = "$active_status course records";
        $operationPerformed = "INSERT";
        $this->createLogEntry($performing_user, $pageAffected, $operationPerformed, "$affectedCourse syllabus record was inserted", $affectedCourse);
    }




}
