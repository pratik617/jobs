<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Http\Requests\StoreApplication;


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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $application = new Application();
        return view('applications.create', compact('application'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApplication $request)
    {
        $preferred_location = ($request->preferred_location != null) ? implode(',', $request->preferred_location) : '';

        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
            'designation' => $request->designation,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'marital_staus' => $request->marital_staus,
            'address1' => $request->address1,
            'address2' => $request->address2,
            'city' => $request->city,
            'state' => $request->state,
            'pincode' => $request->pincode,
            'languages' => json_encode($request->languages),
            'preferred_location' => $preferred_location,
            'department' => $request->department,
            'notice_period' => $request->notice_period,
            'expected_ctc' => $request->expected_ctc,
            'current_ctc' => $request->current_ctc,
        ];
        
        $application = Application::create($data);
        
        // START Education Details
        if ($request->ssc_awarding_body != null && $request->ssc_passing_year != null && $request->ssc_percentage != null) {
            $application->educationDetails()->create([
                'examination' => 'SSC',
                'awarding_body' => $request->ssc_awarding_body,
                'passing_year' => $request->ssc_passing_year,
                'percentage' => $request->ssc_percentage,
            ]);    
        }

        if ($request->hsc_awarding_body != null && $request->hsc_passing_year != null && $request->hsc_percentage != null) {
            $application->educationDetails()->create([
                'examination' => 'HSC',
                'awarding_body' => $request->hsc_awarding_body,
                'passing_year' => $request->hsc_passing_year,
                'percentage' => $request->hsc_percentage,
            ]);    
        }

        if ($request->bachelor_course_name != null && $request->bachelor_awarding_body != null && $request->bachelor_passing_year != null && $request->bachelor_percentage != null) {
            $application->educationDetails()->create([
                'examination' => 'Bachelor',
                'course_name' => $request->bachelor_course_name,
                'awarding_body' => $request->bachelor_awarding_body,
                'passing_year' => $request->bachelor_passing_year,
                'percentage' => $request->bachelor_percentage,
            ]);    
        }

        if ($request->master_course_name != null && $request->master_awarding_body != null && $request->master_passing_year != null && $request->master_percentage != null) {
            $application->educationDetails()->create([
                'examination' => 'Master',
                'course_name' => $request->master_course_name,
                'awarding_body' => $request->master_awarding_body,
                'passing_year' => $request->master_passing_year,
                'percentage' => $request->master_percentage,
            ]);    
        }
        // END Education Details
        
        // START Work Experiences
        $work_experiences___form_arr = $request->work_experiences___form;
        foreach($work_experiences___form_arr as $work_experiences___form_item) {
            $company_name = $work_experiences___form_item['company_name'];
            $designation = $work_experiences___form_item['designation'];
            $experience_from = $work_experiences___form_item['experience_from'];
            $experience_to = $work_experiences___form_item['experience_to'];

            if ($company_name != null && $designation != null && $experience_from != null && $experience_to != null) {
                $application->workExperiences()->create([
                    'company_name' => $company_name,
                    'designation' => $designation,
                    'experience_from' => $experience_from,
                    'experience_to' => $experience_to,
                ]);    
            }
        }
        // END Work Experiences

        // START Reference Contact
        $reference_contact___form_arr = $request->reference_contact___form;
        foreach($reference_contact___form_arr as $reference_contact___form_item) {
            $name = ($reference_contact___form_item['name']) ? $reference_contact___form_item['name'] : '';
            $mobile_number = ($reference_contact___form_item['mobile_number']) ? $reference_contact___form_item['mobile_number'] : '';
            $relation = ($reference_contact___form_item['relation']) ? $reference_contact___form_item['relation'] : '';

            if ($name != '' && $mobile_number != '' && $relation != '') {
                $application->references()->create([
                    'name' => $name,
                    'mobile_number' => $mobile_number,
                    'relation' => $relation,
                ]);    
            }
        }
        // END Reference Contact

        if (isset($request->technologies) && count($request->technologies)) {
            foreach($request->technologies as $technology => $skill_level) {
                $application->technologies()->create([
                    'technology' => $technology,
                    'skill_level' => $skill_level
                ]);
            }    
        }

        return redirect()->route('applications.show', base64_encode($application->id))
            ->with('success', 'Your application has been submitted successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $application = Application::findOrFail(base64_decode($id));

        $ssc = $application->educationDetails()->where('examination', 'SSC')->first();
        $hsc = $application->educationDetails()->where('examination', 'HSC')->first();
        $bachelor = $application->educationDetails()->where('examination', 'Bachelor')->first();
        $master = $application->educationDetails()->where('examination', 'Master')->first();

        return view('applications.show', compact('application', 'ssc', 'hsc', 'bachelor', 'master'));
    }

    public function download($id) {

    }


}
