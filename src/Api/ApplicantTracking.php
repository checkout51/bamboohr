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
     * @param int $jobId
     * @param int $page
     * @param string|null $applicationStatusId
     * @param string|null $searchString
     * @return Response
     */
    public function getApplications(int $jobId, int $page = 1, string $applicationStatusId = null, $searchString = null)
    {
        $params = [
            "jobId" => $jobId,
            "page" => $page
        ];

        if ($applicationStatusId) {
            $params["applicationStatusId"] = $applicationStatusId;
        }
        if ($searchString) {
            $params["searchString"] = $searchString;
        }

        return $this->get("applicant_tracking/applications", $params);
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
     * Get application comments
     *
     * @param int $applicationId
     * @return Response
     */
    public function getApplicationComments(int $applicationId)
    {
        return $this->get("applicant_tracking/applications/{$applicationId}/comments");
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
        return $this->post("applicant_tracking/applications/{$applicationId}/comments", json_encode([
            "type" => "comment",
            "comment" => $comment
        ]));
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