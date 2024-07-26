<?php

namespace BambooHR\Api;

/**
 * Applicant Tracking API
 *
 * @link https://documentation.bamboohr.com/reference/applicant-tracking
 */
class ApplicantTracking extends AbstractApi
{
    /**
     * Get job summaries
     *
     * @return \BambooHR\Api\Response
     */
    public function getJobSummaries()
    {
        return $this->get("applicant_tracking/jobs");
    }

    /**
     * Get applications
     *
     * @param string $jobId
     * @param int $page
     *
     * @return \BambooHR\Api\Response
     */
    public function getApplications(int $jobId, int $page = 1)
    {
        return $this->get("applicant_tracking/applications", ["page" => $page, "jobId" => $jobId]);
    }


    /**
     * Get application details
     *
     * @param string $applicationId
     *
     * @return \BambooHR\Api\Response
     */
    public function getApplicationDetails(int $applicationId)
    {
        return $this->get("applicant_tracking/applications/{$applicationId}");
    }

    /**
     * Add application comment
     *
     * @param int $applicationId
     * @param string $comment
     * @return Response|object
     */
    public function addApplicationComment(int $applicationId, string $comment)
    {
        return $this->post("applicant_tracking/applications/{$applicationId}/comments", json_encode(["type" => "comment", "comment" => $comment]));
    }

    /**
     * Change applicant's status
     *
     * @param int $applicationId
     * @param int $status
     * @return Response|object
     */
    public function changeApplicantStatus(int $applicationId, int $status)
    {
        return $this->post("applicant_tracking/applications/{$applicationId}/status", json_encode(["status" => $status]));
    }
}