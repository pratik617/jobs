@extends('admin.layouts.app')
@section('title', 'Manage Applications')

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
   <div class="container ">

      <!--begin::Card-->
      <div class="card card-custom">
         <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
               <h3 class="card-label">
                    Applications
                  <span class="d-block text-muted pt-2 font-size-sm"><span id="total_records_count"></span> Total</span>
               </h3>
            </div>
            <div class="card-toolbar">
               <!--begin::Dropdown-->
               <div class="dropdown dropdown-inline mr-2">

                <div class="input-icon">
                    <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                    <span><i class="flaticon2-search-1 text-muted"></i></span>
                </div>
               </div>
               <!--end::Dropdown-->

            </div>
         </div>
         <div class="card-body">

            <!--begin: Datatable -->
            <table class="table table-striped- table-hover table-sm" id="applications__table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Applicant Name</th>
                        <th>Application Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <!--end: Datatable -->

         </div>
      </div>
      <!--end::Card-->
   </div>
   <!--end::Container-->
</div>
<!--end::Entry-->

@endsection

@push('footer_scripts')
<script type="text/javascript">

    $(function() {
      
        var dtable = $('#applications__table').dataTable({
            scrollX: true,
            responsive: true,
            processing: true,
            serverSide: true,
            dom: `t<'row'<'col-sm-12 col-md-3'l><'col-sm-12 col-md-4'i><'col-sm-12 col-md-5'p>>r`,
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            pagingType: 'full_numbers',
            ajax: {
                url : '{!! route('admin.applications.data') !!}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'POST',
            },
            columnDefs: [ {
                orderable: false,
                targets: 0
            }],
            "order": [],
            columns: [
                { data: 'id', name: 'id' },
                { data: 'full_name', name: 'full_name', sortable: false },
                { data: 'created_at', name: 'created_at' },
                { data: 'actions', name: 'actions', sortable: false, searchable: false, width: 150 },
            ],
            drawCallback: function(settings) {
                $("#total_records_count").text(this.api().page.info().recordsDisplay);
            }
        }).api();

        $("#kt_datatable_search_query").keyup(function(e) {
            var value = $(this).val();
            if(value.length >= 3 || e.keyCode == 13) {
                dtable.search(value).draw();
            }
            if(value == "") {
                dtable.search("").draw();
            }
            return;
        });
      });

    
      
</script>
@endpush