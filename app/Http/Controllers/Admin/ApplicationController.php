<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;

use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class ApplicationController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.applications.index');
    }

    public function getData(Request $request) {
        $applications = Application::orderBy('id', 'desc')->get();

        return Datatables::of($applications)
            ->addColumn('full_name', function($application) {
                return $application->full_name;
            })
            ->addColumn('actions', function ($application) {
                    return '
                        <a target="_blank" href="'.route('admin.applications.show', base64_encode($application->id)).'" class="">View Application</a>
                    ';
            })
            ->editColumn('created_at', function($application) {
            	if ($application->created_at != null) {
	            	$created_at = Carbon::createFromFormat('Y-m-d H:i:s', $application->created_at);
	            	return $created_at->format('d-m-Y h:i A');            		
            	}
            })
            ->editColumn('updated_at', function($application) {
            	if ($application->updated_at != null) {
	            	$updated_at = Carbon::createFromFormat('Y-m-d H:i:s', $application->updated_at);
	            	return $updated_at->format('d-m-Y h:i A');            		
            	}
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = base64_decode($id);
        $application = Application::findOrFail($id);

        $ssc = $application->educationDetails()->where('examination', 'SSC')->first();
        $hsc = $application->educationDetails()->where('examination', 'HSC')->first();
        $bachelor = $application->educationDetails()->where('examination', 'Bachelor')->first();
        $master = $application->educationDetails()->where('examination', 'Master')->first();

        return view('admin.applications.show', compact('application', 'ssc', 'hsc', 'bachelor', 'master'));
    }

}
