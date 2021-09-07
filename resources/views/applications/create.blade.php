<!DOCTYPE html>
<html lang="en" >
   <!--begin::Head-->
   <head>
      <meta charset="utf-8"/>
      <title>{{ config('app.name', 'JOB') }}</title>
      <meta name="description" content="Updates and statistics"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <!--begin::Fonts-->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
      <!--end::Fonts-->

      @include('inc._css')

      <!-- <link rel="shortcut icon" href="assets/media/logos/favicon.ico"/> -->

      @stack('styles')

      <style>
          .aside-enabled .header.header-fixed {
              left: 0px;
          }
          .header-fixed.subheader-fixed.subheader-enabled .wrapper
          {
            //padding-top: 65px;
          }

          .aside-fixed .wrapper {
            padding-left: 0px;
          }

          .aside-enabled.subheader-fixed .subheader {
             left: 0;
          }

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
            header a {
                transition: all 0.3s;
            }
            header i {
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
            .address-space {
                height: 0;
            }

            @media only screen and (min-width: 992px) {
                .address-space {
                    height: 19px;
                }
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
                <div class="d-flex flex-column-fluid pt-5" style="background-color: #EEF0F8;">
                    <!--begin::Container-->
                    <div class="container-fluid">
                        
                        @if (session('success'))
                            <div class="alert alert-success fade show" role="alert">
                                <div class="alert-text">{{ session('success') }}</div>
                            </div>
                        @endif

                        <h4 class="text-center mb-3">Job Application Form</h4>

                        <!--begin::Form-->
                        <form class="form" id="requirement__form" action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- begin::Card Basic Details -->
                            <div class="card card-custom gutter-b">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Basic Details
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-lg-3">
                                            <label for="first_name">* First Name</label>
                                            <input type="text" id="first_name" name="first_name" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : ''}}" value="{{ old('first_name') }}"/>
                                            {!! $errors->first('first_name', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label for="last_name">* Last Name</label>
                                            <input type="text" id="last_name" name="last_name" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : ''}}" value="{{ old('last_name') }}"/>
                                            {!! $errors->first('last_name', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label for="email">* Email Address</label>
                                            <input type="text" id="email" name="email" class="email form-control{{ $errors->has('email') ? ' is-invalid' : ''}}" value="{{ old('email') }}"/>
                                            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label for="mobile_number">* Mobile No</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">+91</span>
                                                </div>
                                                <input type="text" id="mobile_number" name="mobile_number" 
                                                    class="mobile-number form-control{{ $errors->has('mobile_number') ? ' is-invalid' : ''}}"
                                                    value="{{ old('mobile_number') }}"/>
                                                {!! $errors->first('mobile_number', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-3">
                                            <label for="designation">* Designation</label>
                                            <input type="text" id="designation" name="designation" 
                                                class="alphabets form-control{{ $errors->has('designation') ? ' is-invalid' : ''}}" value="{{ old('designation') }}"/>
                                            {!! $errors->first('designation', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label for="date_of_birth">* Date of Birth</label>
                                            <input type="text" 
                                                class="form-control{{ $errors->has('date_of_birth') ? ' is-invalid' : ''}}" 
                                                value="{{ old('date_of_birth') }}"
                                                id="date_of_birth" name="date_of_birth" placeholder="Select date">
                                            <span class="form-text text-warning">Date Format: DD-MM-YYYY</span>
                                            {!! $errors->first('date_of_birth', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label for="gender">* Gender</label>
                                            <div class="radio-inline{{ $errors->has('gender') ? ' is-invalid' : ''}}">
                                                <label class="radio radio-solid">
                                                    <input type="radio" name="gender" value="male"{{ old("gender") == 'male' ? ' checked' : '' }}>
                                                    <span></span>
                                                    Male
                                                </label>
                                                <label class="radio radio-solid">
                                                    <input type="radio" name="gender" value="female"{{ old("gender") == 'female' ? ' checked' : '' }}>
                                                    <span></span>
                                                    Female
                                                </label>
                                                <label class="radio radio-solid">
                                                    <input type="radio" name="gender" value="transgender"{{ old("gender") == 'transgender' ? ' checked' : '' }}>
                                                    <span></span>
                                                    Transgender
                                                </label>
                                            </div>
                                            {!! $errors->first('gender', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label for="marital_staus">* Marital Staus</label>
                                            <div class="radio-inline{{ $errors->has('marital_staus') ? ' is-invalid' : ''}}">
                                                <label class="radio radio-solid">
                                                    <input type="radio" name="marital_staus" value="married"{{ old("marital_staus") == 'married' ? ' checked' : '' }}>
                                                    <span></span>
                                                    Married
                                                </label>
                                                <label class="radio radio-solid">
                                                    <input type="radio" name="marital_staus" value="unmarried"{{ old("marital_staus") == 'unmarried' ? ' checked' : '' }}>
                                                    <span></span>
                                                    Unmarried
                                                </label>
                                                <label class="radio radio-solid">
                                                    <input type="radio" name="marital_staus" value="separated"{{ old("marital_staus") == 'separated' ? ' checked' : '' }}>
                                                    <span></span>
                                                    Separated
                                                </label>
                                            </div>
                                            {!! $errors->first('marital_staus', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="form-group col-lg-6">
                                                    <label for="address1">* Address1</label>
                                                    <input type="text" id="address1" name="address1" class="form-control{{ $errors->has('address1') ? ' is-invalid' : ''}}" value="{{ old('address1') }}"/>
                                                    {!! $errors->first('address1', '<div class="invalid-feedback">:message</div>') !!}
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label for="address2">Address2</label>
                                                    <input type="text" id="address2" name="address2" class="form-control{{ $errors->has('address2') ? ' is-invalid' : ''}}" value="{{ old('address2') }}"/>
                                                    {!! $errors->first('address2', '<div class="invalid-feedback">:message</div>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="form-group col-lg-4">
                                                    <label for="state">* State</label>
                                                    <select id="state" name="state" 
                                                        class="communication-details-control form-control{{ $errors->has('state') ? ' is-invalid' : ''}}">
                                                        <option value="">Select State</option>
                                                        @foreach(config('constants.STATE') as $state)
                                                            <option value="{{ $state }}"{{ (old('state') == $state) ? ' selected' : '' }}>{{ $state }}</option>
                                                        @endforeach
                                                    </select>
                                                    {!! $errors->first('state', '<div class="invalid-feedback">:message</div>') !!}
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label for="city">* City</label>
                                                    <input type="text" id="city" name="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : ''}}" value="{{ old('city') }}"/>
                                                    {!! $errors->first('city', '<div class="invalid-feedback">:message</div>') !!}
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label for="pincode">* PIN Code</label>
                                                    <input type="text" id="pincode" name="pincode" 
                                                        class="pincode numeric form-control{{ $errors->has('pincode') ? ' is-invalid' : ''}}"
                                                        value="{{ old('pincode') }}"/>
                                                    {!! $errors->first('pincode', '<div class="invalid-feedback">:message</div>') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- end::Card Basic Details -->
                            
                            <!-- begin::Card Education Details -->
                            <div class="card card-custom gutter-b">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Education Details
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title">SSC Result</h6>
                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label for="ssc_awarding_body">Name of Board</label>
                                            <input type="text" id="ssc_awarding_body" name="ssc_awarding_body" class="form-control{{ $errors->has('ssc_awarding_body') ? ' is-invalid' : ''}}" value="{{ old('ssc_awarding_body') }}"/>
                                            {!! $errors->first('ssc_awarding_body', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="ssc_passing_year">Passing Year</label>
                                            <input type="text" id="ssc_passing_year" name="ssc_passing_year" class="form-control{{ $errors->has('ssc_passing_year') ? ' is-invalid' : ''}}" value="{{ old('ssc_passing_year') }}" placeholder="Select year"/>
                                            <span class="form-text text-warning">Date Format: YYYY</span>
                                            {!! $errors->first('ssc_passing_year', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="ssc_percentage">Percentage</label>
                                            <div class="input-group">
                                                <input type="text" id="ssc_percentage" name="ssc_percentage" class="form-control{{ $errors->has('ssc_percentage') ? ' is-invalid' : ''}}" value="{{ old('ssc_percentage') }}"/>
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="la la-percent icon-lg"></i></span>
                                                </div>
                                                {!! $errors->first('ssc_percentage', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="separator separator-dashed my-5"></div>

                                    <h6 class="card-title">HSC/Diploma Result</h6>
                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label for="hsc_awarding_body">Name of Board</label>
                                            <input type="text" id="hsc_awarding_body" name="hsc_awarding_body" class="form-control{{ $errors->has('hsc_awarding_body') ? ' is-invalid' : ''}}" value="{{ old('hsc_awarding_body') }}"/>
                                            {!! $errors->first('hsc_awarding_body', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="hsc_passing_year">Passing Year</label>
                                            <input type="text" id="hsc_passing_year" name="hsc_passing_year" class="form-control{{ $errors->has('hsc_passing_year') ? ' is-invalid' : ''}}" value="{{ old('hsc_passing_year') }}" placeholder="Select year"/>
                                            <span class="form-text text-warning">Date Format: YYYY</span>
                                            {!! $errors->first('hsc_passing_year', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="hsc_percentage">Percentage</label>
                                            <div class="input-group">
                                                <input type="text" id="hsc_percentage" name="hsc_percentage" class="form-control{{ $errors->has('hsc_percentage') ? ' is-invalid' : ''}}" value="{{ old('hsc_percentage') }}"/>
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="la la-percent icon-lg"></i></span>
                                                </div>
                                                {!! $errors->first('hsc_percentage', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="separator separator-dashed my-5"></div>

                                    <h6 class="card-title">Bachelor Degree</h6>
                                    <div class="row">
                                        <div class="form-group col-lg-3">
                                            <label for="bachelor_course_name">Course Name</label>
                                            <input type="text" id="bachelor_course_name" name="bachelor_course_name" class="form-control{{ $errors->has('bachelor_course_name') ? ' is-invalid' : ''}}" value="{{ old('bachelor_course_name') }}"/>
                                            {!! $errors->first('bachelor_course_name', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label for="bachelor_awarding_body">University</label>
                                            <input type="text" id="bachelor_awarding_body" name="bachelor_awarding_body" class="form-control{{ $errors->has('bachelor_awarding_body') ? ' is-invalid' : ''}}" value="{{ old('bachelor_awarding_body') }}"/>
                                            {!! $errors->first('bachelor_awarding_body', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label for="bachelor_passing_year">Passing Year</label>
                                            <input type="text" id="bachelor_passing_year" name="bachelor_passing_year" class="form-control{{ $errors->has('bachelor_passing_year') ? ' is-invalid' : ''}}" value="{{ old('bachelor_passing_year') }}" placeholder="Select year"/>
                                            <span class="form-text text-warning">Date Format: YYYY</span>
                                            {!! $errors->first('bachelor_passing_year', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label for="bachelor_percentage">Percentage</label>
                                            <div class="input-group">
                                                <input type="text" id="bachelor_percentage" name="bachelor_percentage" class="form-control{{ $errors->has('bachelor_percentage') ? ' is-invalid' : ''}}" value="{{ old('bachelor_percentage') }}"/>
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="la la-percent icon-lg"></i></span>
                                                </div>
                                                {!! $errors->first('bachelor_percentage', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="separator separator-dashed my-5"></div>

                                    <h6 class="card-title">Master Degree</h6>
                                    <div class="row">
                                        <div class="form-group col-lg-3">
                                            <label for="master_course_name">Course Name</label>
                                            <input type="text" id="master_course_name" name="master_course_name" class="form-control{{ $errors->has('master_course_name') ? ' is-invalid' : ''}}" value="{{ old('master_course_name') }}"/>
                                            {!! $errors->first('course_name', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label for="master_awarding_body">University</label>
                                            <input type="text" id="master_awarding_body" name="master_awarding_body" class="form-control{{ $errors->has('master_awarding_body') ? ' is-invalid' : ''}}" value="{{ old('master_awarding_body') }}"/>
                                            {!! $errors->first('master_awarding_body', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label for="master_passing_year">Passing Year</label>
                                            <input type="text" id="master_passing_year" name="master_passing_year" class="form-control{{ $errors->has('master_passing_year') ? ' is-invalid' : ''}}" value="{{ old('master_passing_year') }}" placeholder="Select year"/>
                                            <span class="form-text text-warning">Date Format: YYYY</span>
                                            {!! $errors->first('master_passing_year', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label for="master_percentage">Percentage</label>
                                            <div class="input-group">
                                                <input type="text" id="master_percentage" name="master_percentage" class="form-control{{ $errors->has('master_percentage') ? ' is-invalid' : ''}}" value="{{ old('master_percentage') }}"/>
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="la la-percent icon-lg"></i></span>
                                                </div>
                                                {!! $errors->first('master_percentage', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- end::Card Education Details -->
                            
                            <!-- begin::Card Work Experiences -->
                            <div class="card card-custom gutter-b">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Work Experiences
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div id="work-experiences___form">
                                        <div data-repeater-list="work_experiences___form" class="col-lg-12">
                                            @if (old("work_experiences___form"))
                                                @foreach(old("work_experiences___form") as $item)
                                                    <div data-repeater-item class="">

                                                        <div class="row">
                                                            <div class="form-group col-lg-3">
                                                                <label for="">* Company Name</label>
                                                                <input type="text" name="company_name" 
                                                                    class="form-control{{ $errors->has('work_experiences___form.'.$loop->index.'.company_name') ? ' is-invalid' : ''}}"
                                                                    value="{{ old('work_experiences___form.'.$loop->index.'.company_name') }}">
                                                                {!! $errors->first('work_experiences___form.'.$loop->index.'.company_name', '<div class="invalid-feedback">:message</div>') !!}
                                                            </div>
                                                            <div class="form-group col-lg-3">
                                                                <label for="">* Designation</label>
                                                                <input type="text" name="designation"
                                                                    class="form-control{{ $errors->has('work_experiences___form.'.$loop->index.'.designation') ? ' is-invalid' : ''}}"
                                                                    value="{{ old('work_experiences___form.'.$loop->index.'.designation') }}">
                                                                {!! $errors->first('work_experiences___form.'.$loop->index.'.designation', '<div class="invalid-feedback">:message</div>') !!}
                                                            </div>
                                                            <div class="form-group col-lg-3">
                                                                <label for="">* Experience From Date</label>
                                                                <input type="text" name="experience_from" placeholder="Select date" 
                                                                    class="form-control experience_from{{ $errors->has('work_experiences___form.'.$loop->index.'.experience_from') ? ' is-invalid' : ''}}"
                                                                    value="{{ old('work_experiences___form.'.$loop->index.'.experience_from') }}">
                                                                {!! $errors->first('work_experiences___form.'.$loop->index.'.experience_from', '<div class="invalid-feedback">:message</div>') !!}
                                                            </div>
                                                            <div class="form-group col-lg-3">
                                                                <label for="">* Experience To Date</label>
                                                                <input type="text" name="experience_to" placeholder="Select date"
                                                                    class="form-control experience_to{{ $errors->has('work_experiences___form.'.$loop->index.'.experience_to') ? ' is-invalid' : ''}}"
                                                                    value="{{ old('work_experiences___form.'.$loop->index.'.experience_to') }}">
                                                                {!! $errors->first('work_experiences___form.'.$loop->index.'.experience_to', '<div class="invalid-feedback">:message</div>') !!}
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label text-right"></label>
                                                            <div class="col-lg-9 col-xl-9 text-right">
                                                                <a href="javascript:;" data-repeater-delete class="btn btn-sm font-weight-bolder btn-danger">
                                                                    <i class="la la-trash-o"></i>Delete
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="separator separator-dashed my-5"></div>

                                                    </div>
                                                @endforeach
                                            @else
                                                <div data-repeater-item class="">
                                                    <div class="row">
                                                        <div class="form-group col-lg-3">
                                                            <label for="">* Company Name</label>
                                                            <input type="text" class="form-control" name="company_name">
                                                        </div>
                                                        <div class="form-group col-lg-3">
                                                            <label for="">* Designation</label>
                                                            <input type="text" class="form-control" name="designation">
                                                        </div>
                                                        <div class="form-group col-lg-3">
                                                            <label for="">* Experience From Date</label>
                                                            <input type="text" class="form-control experience_from" name="experience_from" placeholder="Select date">
                                                        </div>
                                                        <div class="form-group col-lg-3">
                                                            <label for="">* Experience To Date</label>
                                                            <input type="text" class="form-control experience_to" name="experience_to" placeholder="Select date">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-right"></label>
                                                        <div class="col-lg-9 col-xl-9 text-right">
                                                            <a href="javascript:;" data-repeater-delete class="btn btn-sm font-weight-bolder btn-danger">
                                                                <i class="la la-trash-o"></i>Delete
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="separator separator-dashed my-5"></div>

                                                </div>
                                            @endif
                                        </div>

                                        <div class="row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right"></label>
                                            <div class="col-lg-9 col-xl-9">
                                                <a href="javascript:;" data-repeater-create class="btn btn-sm font-weight-bolder btn-primary">
                                                    <i class="la la-plus"></i>Add
                                                </a>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <!-- end::Card Work Experiences -->
                            
                            <div class="row">
                                <div class="col-6">

                                    <!-- begin::Card Language Proficiency -->
                                    <div class="card card-custom gutter-b">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Language Proficiency
                                            </h3>
                                        </div>
                                        <div class="card-body">

                                            <table class="table{{ $errors->has('languages') ? ' is-invalid' : ''}}">
                                                <thead>
                                                    <th scope="col">Language</th>
                                                    <th scope="col">Read</th>
                                                    <th scope="col">Write</th>
                                                    <th scope="col">Speak</th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">English</th>
                                                        <td>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="languages[]" value="english_read"
                                                                    {{ (old('languages') && in_array('english_read', old('languages'))) ? ' checked' : '' }}>
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="languages[]" value="english_write"
                                                                    {{ (old('languages') && in_array('english_write', old('languages'))) ? ' checked' : '' }}>
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="languages[]" value="english_speak"
                                                                    {{ (old('languages') && in_array('english_speak', old('languages'))) ? ' checked' : '' }}>
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Hindi</th>
                                                        <td>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="languages[]" value="hindi_read"
                                                                    {{ (old('languages') && in_array('hindi_read', old('languages'))) ? ' checked' : '' }}>
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="languages[]" value="hindi_write"
                                                                    {{ (old('languages') && in_array('hindi_write', old('languages'))) ? ' checked' : '' }}>
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="languages[]" value="hindi_speak"
                                                                    {{ (old('languages') && in_array('hindi_speak', old('languages'))) ? ' checked' : '' }}>
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Gujarati</th>
                                                        <td>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="languages[]" value="gujarati_read"
                                                                    {{ (old('languages') && in_array('gujarati_read', old('languages'))) ? ' checked' : '' }}>
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="languages[]" value="gujarati_write"
                                                                    {{ (old('languages') && in_array('gujarati_write', old('languages'))) ? ' checked' : '' }}>
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="languages[]" value="gujarati_speak"
                                                                    {{ (old('languages') && in_array('gujarati_speak', old('languages'))) ? ' checked' : '' }}>
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                            {!! $errors->first('languages', '<div class="invalid-feedback">:message</div>') !!}
                                        
                                        </div>
                                    </div>
                                    <!-- end::Card Language Proficiency -->

                                </div>
                                <div class="col-6">

                                    <!-- begin::Card Technologies You Know -->
                                    <div class="card card-custom gutter-b">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Technologies You Know
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                        
                                            <table class="table table-borderless{{ $errors->has('technologies') ? ' is-invalid' : ''}}">
                                                <tbody>
                                                    @foreach(config('constants.TECHNOLOGIES') as $technology)
                                                        <tr>
                                                            <th scope="row">{{ $technology }}</th>
                                                            <div class="radio-inline{{ $errors->has('gender') ? ' is-invalid' : ''}}">
                                                                @foreach(config('constants.TECHNOLOGY_SKILL_LEVEL') as $skill_level)
                                                                    <td>
                                                                        <label class="radio radio-solid">
                                                                            <input type="radio" name="technologies[{{ $technology }}]" value="{{ $skill_level }}"
                                                                            >
                                                                            <span></span>
                                                                            &nbsp; {{ ucwords($skill_level) }}
                                                                        </label>
                                                                    </td>
                                                                @endforeach
                                                            </div>
                                                        </tr>
                                                    @endforeach
                                                    
                                                </tbody>
                                            </table>
                                            {!! $errors->first('technologies', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                    </div>
                                    <!-- end::Card Technologies You Know -->

                                </div>
                            </div>
                            
                            <!-- begin::Card Reference Contact -->
                            <div class="card card-custom gutter-b">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Reference Contact
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div id="reference-contact___form">
                                        <div data-repeater-list="reference_contact___form" class="col-lg-12">
                                            @if (old("reference_contact___form"))
                                                @foreach(old("reference_contact___form") as $item)
                                                    <div data-repeater-item class="">

                                                        <div class="row">
                                                            <div class="form-group col-lg-4">
                                                                <label for="">Name</label>
                                                                <input type="text" name="name"
                                                                    class="form-control{{ $errors->has('reference_contact___form.'.$loop->index.'.name') ? ' is-invalid' : ''}}"
                                                                    value="{{ old('reference_contact___form.'.$loop->index.'.name') }}">
                                                                {!! $errors->first('reference_contact___form.'.$loop->index.'.name', '<div class="invalid-feedback">:message</div>') !!}
                                                            </div>
                                                            <div class="form-group col-lg-4">
                                                                <label for="">Mobile No</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">+91</span>
                                                                    </div>
                                                                    <input type="text" name="mobile_number"
                                                                        class="mobile-number form-control{{ $errors->has('reference_contact___form.'.$loop->index.'.mobile_number') ? ' is-invalid' : ''}}"
                                                                        value="{{ old('reference_contact___form.'.$loop->index.'.mobile_number') }}">
                                                                    {!! $errors->first('reference_contact___form.'.$loop->index.'.mobile_number', '<div class="invalid-feedback">:message</div>') !!}
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-lg-4">
                                                                <label for="">Relation</label>
                                                                <input type="text" class="form-control" name="relation"
                                                                    class="form-control{{ $errors->has('reference_contact___form.'.$loop->index.'.relation') ? ' is-invalid' : ''}}"
                                                                    value="{{ old('reference_contact___form.'.$loop->index.'.relation') }}">
                                                                {!! $errors->first('reference_contact___form.'.$loop->index.'.relation', '<div class="invalid-feedback">:message</div>') !!}
                                                            </div>

                                                        </div>

                                                        <div class="row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label text-right"></label>
                                                            <div class="col-lg-9 col-xl-9 text-right">
                                                                <a href="javascript:;" data-repeater-delete class="btn btn-sm font-weight-bolder btn-danger">
                                                                    <i class="la la-trash-o"></i>Delete
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="separator separator-dashed my-5"></div>

                                                    </div>
                                                @endforeach
                                            @else
                                                <div data-repeater-item class="">
                                                    <div class="row">
                                                        <div class="form-group col-lg-4">
                                                            <label for="">Name</label>
                                                            <input type="text" class="form-control" name="name">
                                                        </div>
                                                        <div class="form-group col-lg-4">
                                                            <label for="">Mobile No</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">+91</span>
                                                                </div>
                                                                <input type="text" class="mobile-number form-control" name="mobile_number">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-lg-4">
                                                            <label for="">Relation</label>
                                                            <input type="text" class="form-control" name="relation">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-right"></label>
                                                        <div class="col-lg-9 col-xl-9 text-right">
                                                            <a href="javascript:;" data-repeater-delete class="btn btn-sm font-weight-bolder btn-danger">
                                                                <i class="la la-trash-o"></i>Delete
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="separator separator-dashed my-5"></div>

                                                </div>
                                            @endif
                                        </div>

                                        <div class="row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right"></label>
                                            <div class="col-lg-9 col-xl-9">
                                                <a href="javascript:;" data-repeater-create class="btn btn-sm font-weight-bolder btn-primary">
                                                    <i class="la la-plus"></i>Add
                                                </a>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <!-- end::Card Reference Contact -->

                            <!-- begin::Card Preferences -->
                            <div class="card card-custom gutter-b">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Preferences
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="preferred_location">* Preferred Location</label>
                                            <select class="form-control{{ $errors->has('preferred_location') ? ' is-invalid' : ''}}" id="preferred_location" name="preferred_location[]" multiple>
                                                <option value="">Select</option>
                                                @foreach(config('constants.PREFERRED_LOCATION') as $preferred_location)
                                                    <option value="{{ $preferred_location }}"
                                                        {{ (old('preferred_location') && in_array($preferred_location, old('preferred_location'))) ? ' selected' : '' }}>
                                                        {{ $preferred_location }}</option>
                                                @endforeach
                                            </select>
                                            {!! $errors->first('preferred_location', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="department">* Department</label>
                                            <select class="form-control{{ $errors->has('department') ? ' is-invalid' : ''}}" id="department" name="department">
                                                <option value="">Select</option>
                                                @foreach(config('constants.DEPARTMENT') as $department)
                                                    <option value="{{ $department }}"{{ (old('department') == $department) ? ' selected' : '' }}>{{ $department }}</option>
                                                @endforeach
                                            </select>
                                            {!! $errors->first('department', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label for="notice_period">* Notice Period</label>
                                            <div class="input-group">
                                                <input type="text" id="notice_period" name="notice_period" class="form-control{{ $errors->has('notice_period') ? ' is-invalid' : ''}}" value="{{ old('notice_period') }}"/>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Month(s)</span>
                                                </div>
                                                {!! $errors->first('notice_period', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                            <span class="form-text text-warning">Notice Period may not be more than 3 Months</span>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="expected_ctc">* Expected CTC</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-rupee-sign icon-lg"></i>
                                                    </span>
                                                </div>
                                                <input type="text" id="expected_ctc" name="expected_ctc" 
                                                    class="form-control{{ $errors->has('expected_ctc') ? ' is-invalid' : ''}}"
                                                    value="{{ old('expected_ctc') }}"/>
                                                {!! $errors->first('expected_ctc', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="current_ctc">* Current CTC</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-rupee-sign icon-lg"></i>
                                                    </span>
                                                </div>
                                                <input type="text" id="current_ctc" name="current_ctc" 
                                                    class="form-control{{ $errors->has('current_ctc') ? ' is-invalid' : ''}}"
                                                    value="{{ old('current_ctc') }}"/>
                                                {!! $errors->first('current_ctc', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- end::Card Preferences -->
                            

                            <div class="d-flex flex-center pb-10">
                                <button class="btn btn-primary font-weight-bolder font-size-sm py-3 px-9" type="submit">Submit</button>
                            </div>

                        </form>
                        <!--end::Form-->

                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Entry-->

                
                <!-- </div> -->
                <!--end::Content-->

                @include('inc.footer')

            </div>
            <!--end::Wrapper-->
         </div>
         <!--end::Page-->
      </div>
      <!--end::Main-->

      <!--begin::Scrolltop-->
      <div id="kt_scrolltop" class="scrolltop">
         <span class="svg-icon">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
               <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <polygon points="0 0 24 0 24 24 0 24"/>
                  <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1"/>
                  <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero"/>
               </g>
            </svg>
            <!--end::Svg Icon-->
         </span>
      </div>
      <!--end::Scrolltop-->

      <!--begin::Global Config(global config for global JS scripts)-->
      <script>
         var KTAppSettings = {
         "breakpoints": {
         "sm": 576,
         "md": 768,
         "lg": 992,
         "xl": 1200,
         "xxl": 1400
         },
         "colors": {
         "theme": {
         "base": {
             "white": "#ffffff",
             "primary": "#3699FF",
             "secondary": "#E5EAEE",
             "success": "#1BC5BD",
             "info": "#8950FC",
             "warning": "#FFA800",
             "danger": "#F64E60",
             "light": "#E4E6EF",
             "dark": "#181C32"
         },
         "light": {
             "white": "#ffffff",
             "primary": "#E1F0FF",
             "secondary": "#EBEDF3",
             "success": "#C9F7F5",
             "info": "#EEE5FF",
             "warning": "#FFF4DE",
             "danger": "#FFE2E5",
             "light": "#F3F6F9",
             "dark": "#D6D6E0"
         },
         "inverse": {
             "white": "#ffffff",
             "primary": "#ffffff",
             "secondary": "#3F4254",
             "success": "#ffffff",
             "info": "#ffffff",
             "warning": "#ffffff",
             "danger": "#ffffff",
             "light": "#464E5F",
             "dark": "#ffffff"
         }
         },
         "gray": {
         "gray-100": "#F3F6F9",
         "gray-200": "#EBEDF3",
         "gray-300": "#E4E6EF",
         "gray-400": "#D1D3E0",
         "gray-500": "#B5B5C3",
         "gray-600": "#7E8299",
         "gray-700": "#5E6278",
         "gray-800": "#3F4254",
         "gray-900": "#181C32"
         }
         },
         "font-family": "Poppins"
         };
      </script>
      <!--end::Global Config-->
      
      @include('inc._js')

      
    <script type="text/javascript">

        window.onbeforeunload = function(e) {
            return 'It is going to be refreshed';
        };



    </script>
        
   </body>
   <!--end::Body-->
</html>