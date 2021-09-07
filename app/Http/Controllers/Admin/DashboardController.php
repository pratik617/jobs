<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Models\Application;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware([
            'auth', 
            'no-cache', 
            'frame-guard', 
            'cross-domain', 
            'dns', 
            'no-sniff', 
            'x-powered-by', 
            'xss'
        ]);
    }

    public function index() {
        $total_applications = Application::count();
        $today_applications = Application::whereDate('created_at', Carbon::today())->count();
        
        return view('admin.dashboard', compact('total_applications', 'today_applications'));
    }
}
