@extends('admin.layouts.app')
@section('title', 'Dashboard')

@push('styles')
    <style type="text/css">
      @media (min-width: 992px) {
        .header-fixed.subheader-fixed.subheader-enabled .wrapper {
            padding-top: 65px;
        }        
      }
    </style>
@endpush

@section('content')

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class=" container ">
    <!--begin::Dashboard-->
    <!--begin::Row-->
    <div class="row">
        <div class="col-lg-6 col-xxl-4">
            <!--begin::Mixed Widget 1-->
            <div class="card card-custom bg-gray-100 card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 bg-danger py-5">
                    <h3 class="card-title font-weight-bolder text-white">Today's</h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body p-0 position-relative overflow-hidden">
                <!--begin::Chart-->
                <div id="kt_mixed_widget_1_chart" class="card-rounded-bottom bg-danger" style="height: 200px"></div>
                <!--end::Chart-->
                <!--begin::Stats-->
                <div class="card-spacer mt-n25">
                    <!--begin::Row-->
                    <div class="row m-0">
                        <div class="col bg-light-danger px-6 py-8 rounded-xl mr-7">
                            <div class="text-danger font-weight-bold font-size-h2 my-2">
                                {{ $today_applications }}
                            </div>
                            <div class="text-danger font-weight-bold font-size-h6 mt-2">
                                Applications
                            </div>
                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Stats-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 1-->
        </div>

        <div class="col-lg-6 col-xxl-4">
            <!--begin::Mixed Widget 1-->
            <div class="card card-custom bg-gray-100 card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 bg-danger py-5">
                    <h3 class="card-title font-weight-bolder text-white">Total</h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body p-0 position-relative overflow-hidden">
                <!--begin::Chart-->
                <div id="kt_mixed_widget_1_chart" class="card-rounded-bottom bg-danger" style="height: 200px"></div>
                <!--end::Chart-->
                <!--begin::Stats-->
                <div class="card-spacer mt-n25">
                    <!--begin::Row-->
                    <div class="row m-0">
                        <div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
                            <div class="text-warning font-weight-bold font-size-h2 my-2">
                                {{ $total_applications }}
                            </div>
                            <div class="text-warning font-weight-bold font-size-h6 mt-2">
                                Applications
                            </div>
                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Stats-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 1-->
        </div>

    </div>
    <!--end::Row-->
    <!--end::Dashboard-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->

@endsection

@push('footer_scripts')
    <script type="text/javascript">
        
    </script>
@endpush
