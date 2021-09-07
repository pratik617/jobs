<!DOCTYPE html>
<html lang="en" >
   <!--begin::Head-->
   <head>
      <meta charset="utf-8"/>
      <title>{{ config('app.name', 'Jobs') }}</title>
      <meta name="description" content="Updates and statistics"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <!--begin::Fonts-->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
      <!--end::Fonts-->

      @include('admin.inc._css')

      <style>
            body {
                background-color: white;
            }
            footer {
                margin-top: auto;
                background-color: #000;
                text-align: center;
                color: #fff;
                padding: 1rem 0;
                font-size: 0.8rem;
            }
            span.spacer {
                display: inline-block;
                width: 10px;
            }
            .self-center {
                align-self: center;
            }
            nav.navbar {
                background-color: #EBA463;
                z-index: 3;
                box-shadow: 0px 0px 1px #fff;
                padding: 0;
            }
            button.navbar-toggler {
                color: white !important;
                padding: 0.7rem 1rem !important;
            }
            li.nav-item.active {

            }
            li.nav-item {
                margin: auto 0.4rem;
                padding: 0.4rem 5px
            }
            li.nav-item a {
                color: white;
                padding: 0.5rem 1rem;
                font-weight: bold;
                font-size: 0.9rem;
            }
            a {
                transition: all 0.3s;
            }
            i {
                color: white;
            }
            li.nav-item:hover {
                background-color: #d78438;
            }
            li.nav-item .dropdown-item:hover, li.nav-item .dropdown-item:focus {
                background-color: #EBA463;
            }
            .navbar-nav .dropdown-menu {
                background-color: #d78438;
                border-radius: 0;
                border: 0;
                padding: 0;
            }
            .required-ele {
                /* background-color: var(--primary4); */
                padding: 0.6rem;
            }

            .required-ele .required-ele-wrapper {
                color: var(--primary4);
                text-align: center;
            }

            .required-ele .required-ele-wrapper i {
                color: #636363;
                vertical-align: middle;
                font-size: 1.3rem;
                /* line-height: 23px; */
                padding-top: 5px;
                padding-left: 5px;
                padding-right: 5px;
                cursor: pointer;
            }

            span.font-icon {
                font-size: 0.7rem;
                display: inline-block;
                line-height: 22px;
                background-color: #636363;
                height: 22px;
                width: 22px;
                text-align: center;
                border-radius: 3px;
                color: white;
                transform: translateY(2px);
                cursor: pointer;
            }
            .content .content-title3 {
                color: #d67f30;
                border: none;
                border-left: 10px solid rgba(130, 134, 144, .35);
                padding-left: 15px;
                font-weight: bold;
                font-family: Arial, Helvetica, sans-serif;
                text-transform: uppercase;    
                font-size: 1.5rem;
                padding-right: 20%;
                display: inline-block;    
                margin-bottom: 0.7rem;
            }
            .la-rupee-sign, .la-percent {
                color: black !important;
            }
      </style>

      <script>
         var APP_URL = {!! json_encode(url('/')) !!};

         window.Laravel = <?php echo json_encode([
               'csrfToken' => csrf_token(),
         ]); ?>
      </script>

   </head>
   <!--end::Head-->

   <!--begin::Body-->
   <body  id="kt_body"  class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading"  >
      <!--begin::Main-->
		<div id="lds-roller">
			<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
		</div>

      <div class="d-flex flex-column flex-root">
         <!--begin::Page-->
         <div class="d-flex flex-row flex-column-fluid page">
            
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid" id="kt_wrapper">
                
                <!--begin::Content-->
                <!-- <div class="content  d-flex flex-column flex-column-fluid" id="kt_content"> -->
                <!-- <div class="content  d-flex flex-column flex-column-fluid" id="app"> -->

                <!--begin::Entry-->
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    <div class="container-fluid">
                       
                        <!--begin::Content-->
                        <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
                            <!--begin::Entry-->
                            <div class="d-flex flex-column-fluid">
                            <!--begin::Container-->
                            <div class=" container-fluid ">
                                @if (session('success'))
                                    <div class="alert alert-success fade show" role="alert">
                                        <div class="alert-text">{{ session('success') }}</div>
                                    </div>
                                @endif
                                
                                <!--begin::Card-->
                                <div class="card card-custom">
                                    
                                    <div class="card-body">

                                        <h4 class="text-center">
                                            Job Application Form
                                        </h4>

                                        <h6 class="mt-7">Basic  Details</h6>
                                        <table class="table table-bordered">
                                            <tr>
                                                <td><span class="font-weight-bold">First Name:</span> {{ $application->first_name }}</td>
                                                <td><span class="font-weight-bold">Last Name:</span> {{ $application->last_name }}</td>
                                            </tr>
                                            <tr>
                                                <td><span class="font-weight-bold">Email Address:</span> {{ $application->email }}</td>
                                                <td><span class="font-weight-bold">Mobile No:</span> +91 - {{ $application->mobile_number }}</td>
                                            </tr>
                                            <tr>
                                                <td><span class="font-weight-bold">Designation:</span> {{ $application->designation }}</td>
                                                <td><span class="font-weight-bold">Date of Birth:</span> {{ Carbon\Carbon::parse($application->date_of_birth)->format('d/m/Y') }}</td>
                                            </tr>
                                            <tr>
                                                <td><span class="font-weight-bold">Gender:</span> {{ ucfirst($application->gender) }}</td>
                                                <td><span class="font-weight-bold">Marital Staus:</span> {{ ucfirst($application->marital_staus) }}</td>
                                            </tr>
                                            <tr>
                                                <td><span class="font-weight-bold">Address1:</span> {{ $application->address1 }}</td>
                                                <td><span class="font-weight-bold">Address2:</span> {{ $application->address2 }}</td>
                                            </tr>
                                            <tr>
                                                <td><span class="font-weight-bold">State:</span> {{ $application->state }}</td>
                                                <td><span class="font-weight-bold">City:</span> {{ $application->city }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan=2><span class="font-weight-bold">PIN Code:</span> {{ $application->pincode }}</td>
                                            </tr>

                                        </table>

                                        <h6 class="mt-7">Education Details</h6>
                                        <table class="table table-bordered">
                                            <thead>
                                                <th scope="col"></th>
                                                <th scope="col">Name of Board</th>
                                                <th scope="col">Passing Year</th>
                                                <th scope="col">Percentage</th>
                                            </thead>

                                            <tr>
                                                <th scope="row">SSC Result</th>
                                                <td>{{ $ssc->awarding_body }}</td>
                                                <td>{{ Carbon\Carbon::parse($ssc->passing_year)->format('Y') }}</td>
                                                <td>{{ $ssc->percentage }}<i class="la la-percent"></i></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">HSC/Diploma Result</th>
                                                <td>{{ $hsc->awarding_body }}</td>
                                                <td>{{ Carbon\Carbon::parse($hsc->passing_year)->format('Y') }}</td>
                                                <td>{{ $hsc->percentage }}<i class="la la-percent"></i></td>
                                            </tr>

                                        </table>

                                        <table class="table table-bordered">
                                            <thead>
                                                <th scope="col"></th>
                                                <th scope="col">Course Name</th>
                                                <th scope="col">University</th>
                                                <th scope="col">Passing Year</th>
                                                <th scope="col">Percentage</th>
                                            </thead>

                                            <tr>
                                                <th scope="row">Bachelor Degree</th>
                                                <td>{{ $bachelor->course_name }}</td>
                                                <td>{{ $bachelor->awarding_body }}</td>
                                                <td>{{ Carbon\Carbon::parse($bachelor->passing_year)->format('Y') }}</td>
                                                <td>{{ $bachelor->percentage }}<i class="la la-percent"></i></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">Master Degree</th>
                                                <td>{{ $master->course_name }}</td>
                                                <td>{{ $master->awarding_body }}</td>
                                                <td>{{ Carbon\Carbon::parse($master->passing_year)->format('Y') }}</td>
                                                <td>{{ $master->percentage }}<i class="la la-percent"></i></td>
                                                <td></td>
                                            </tr>

                                        </table>

                                        <h6 class="mt-12">Work Experiences</h6>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
									                <th style="word-wrap:break-word; padding-top:0;">Company Name</th>
									                <th style="word-wrap:break-word; padding-top:0;">Designation</th>
									                <th style="word-wrap:break-word; padding-top:0;">Experience From Date</th>
                                                    <th style="word-wrap:break-word; padding-top:0;">Experience To Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($application->workExperiences as $work_experience)
                                                    <tr>
                                                        <td>{{ $work_experience->company_name }}</td>
                                                        <td>{{ $work_experience->designation }}</td>
                                                        <td>{{ Carbon\Carbon::parse($work_experience->experience_from)->format('d/m/Y') }}</td>
                                                        <td>{{ Carbon\Carbon::parse($work_experience->experience_to)->format('d/m/Y') }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <div class="row">
                                            <div class="col-6">
                                                <h6 class="mt-12">Language Proficiency</h6>
                                                @php
                                                    $languages = json_decode($application->languages);
                                                @endphp
                                                <table class="table table-borderless">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Language</th>
                                                            <th scope="col">Read</th>
                                                            <th scope="col">Write</th>
                                                            <th scope="col">Speak</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">English</th>
                                                            <td>{{ (in_array('english_read', $languages)) ? 'Yes' : 'No' }}</td>
                                                            <td>{{ (in_array('english_write', $languages)) ? 'Yes' : 'No' }}</td>
                                                            <td>{{ (in_array('english_speak', $languages)) ? 'Yes' : 'No' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Hindi</th>
                                                            <td>{{ (in_array('hindi_read', $languages)) ? 'Yes' : 'No' }}</td>
                                                            <td>{{ (in_array('hindi_write', $languages)) ? 'Yes' : 'No' }}</td>
                                                            <td>{{ (in_array('hindi_speak', $languages)) ? 'Yes' : 'No' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Gujarati</th>
                                                            <td>{{ (in_array('gujarati_read', $languages)) ? 'Yes' : 'No' }}</td>
                                                            <td>{{ (in_array('gujarati_write', $languages)) ? 'Yes' : 'No' }}</td>
                                                            <td>{{ (in_array('gujarati_speak', $languages)) ? 'Yes' : 'No' }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-6">
                                                <h6 class="mt-12">Technologies You Know</h6>
                                                <table class="table table-borderless">
                                                    <tbody>
                                                        @foreach($application->technologies as $technology)
                                                            <tr>
                                                                <th scope="row">{{ $technology->technology }}</th>
                                                                <td>{{ ucfirst($technology->skill_level) }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <h6 class="mt-12">Reference Contact</h6>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
									                <th style="word-wrap:break-word; padding-top:0;">Name</th>
									                <th style="word-wrap:break-word; padding-top:0;">Mobile No</th>
									                <th style="word-wrap:break-word; padding-top:0;">Relation</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($application->references as $reference)
                                                    <tr>
                                                        <td>{{ $reference->name }}</td>
                                                        <td>+91 - {{ $reference->mobile_number }}</td>
                                                        <td>{{ $reference->relation }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <h6 class="mt-7">Preferences</h6>
                                        <table class="table table-bordered">
                                            <tr>
                                                <td><span class="font-weight-bold">Preferred Location:</span> {{ $application->preferred_location	 }}</td>
                                                <td><span class="font-weight-bold">Department:</span> {{ $application->department }}</td>
                                            </tr>
                                            <tr>
                                                <td><span class="font-weight-bold">Notice Period:</span> {{ $application->notice_period }} Month(s)</td>
                                                <td><span class="font-weight-bold">Expected CTC:</span> <i class="la la-rupee-sign"></i>{{ $application->expected_ctc }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan=2><span class="font-weight-bold">Current CTC:</span> <i class="la la-rupee-sign"></i>{{ $application->current_ctc }}</td>
                                            </tr>
                                        </table>


                                    </div>
                                </div>
                                <!--end::Card-->

                            </div>
                            <!--end::Container-->
                            </div>
                            <!--end::Entry-->
                        </div>

                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Entry-->

                
                <!-- </div> -->
                <!--end::Content-->

            </div>
            <!--end::Wrapper-->
         </div>
         <!--end::Page-->
      </div>
      <!--end::Main-->

   </body>
   <!--end::Body-->
</html>
