<?php

namespace App\Services;

use Github\Exception\ErrorException;
use GrahamCampbell\GitHub\GitHubManager;
use GuzzleHttp\Exception\ServerException;

class GitService implements GitServiceInterface
{

    /** @var GitHubManager */
    private $gitHub;

    private $eventPoints = [
        'PushEvent' => 10,
        'PullRequestEvent' => 5,
        'IssueCommentEvent' => 4
    ];

    public function __construct(GitHubManager $gitHub)
    {
        $this->gitHub = $gitHub;
    }

    public function getUserScore($username)
    {
        $activity = $this->getUserActivity($username);
        return $this->countUserScore(collect($activity));
    }

    private function getUserActivity($username)
    {
        try{
            return $this->gitHub->user()->publicEvents($username);
        }catch (\RuntimeException $e) {
            return [];
        }
    }

    private function countUserScore($activity)
    {
        $res = [
            'PushEvent' => 0,
            'PullRequestEvent' => 0,
            'IssueCommentEvent' => 0,
            'Other' => 0,
            'Total' => 0
        ];

        $activity->each(function($item) use (&$res) {
            if(array_key_exists($item['type'], $this->eventPoints)) {
                $res[$item['type']] += $this->eventPoints[$item['type']];
            }else{
                $res['Other']++;
            }
        });
        $res['Total'] = array_sum($res);
        return $res;
    }
}
