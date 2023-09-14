<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Repository\UserRepository;

class DashboardController extends Controller
{
    public function __construct(UserRepository $user_repository)
    {
        $this->user_repository = $user_repository;
    }

    public function showChart()
    {
        $chart_data = $this->user_repository->getPostCountByUsers();
        return view('dashboard', compact('chart_data'));
    }
}
