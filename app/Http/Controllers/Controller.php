<?php

namespace App\Http\Controllers;

use App\Services\GitServiceInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /** @var GitServiceInterface */
    private $gitService;
    public function __construct(GitServiceInterface $gitService)
    {
        $this->gitService = $gitService;
    }

    public function index()
    {
        $username = request('username');
        $score = $this->gitService->getUserScore($username);
        return view('welcome', $username ? $score : []);
    }
}
