<?php 

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use Inertia\Inertia; 
use App\Http\Controllers\Controller;
use App\Services\UserService;
class IndexController extends Controller 
{
     /**
     * @var userService
     */
    protected $userService;

    /**
     * PostController Constructor
     *
     * @param UserService $userService
     *
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function show() {
        return Inertia::render('Patient/Index',['doctors'=>$this->userService->getAllDoctors()]);
    }
}