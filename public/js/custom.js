$(".mobile-number").inputmask("mask", {
    "mask": "9999999999"
});

$('#date_of_birth').datepicker({
    format: "dd-mm-yyyy",
    autoclose: true,
    endDate: "today"
}).on('changeDate', function(e) {
    // validator.revalidateField('date_of_birth');
});

$(".pincode").inputmask("mask", {
    "mask": "999999"
});

$('#ssc_passing_year, #hsc_passing_year, #bachelor_passing_year, #master_passing_year').datepicker({
    format: "yyyy",
    viewMode: "years",
    minViewMode: "years",
    autoclose: true,
    endDate: "today"
}).on('changeDate', function(e) {
    // validator.revalidateField($(this).attr('name'));
});

$('#work-experiences___form').repeater({
    initEmpty: false,
    
    defaultValues: {
        'text-input': 'foo'
    },

    isFirstItemUndeletable: true,
    
    show: function() {
        $(this).slideDown();

        var experience_from_date_name = $("[data-repeater-list=work_experiences___form] [data-repeater-item]:last-child .experience_from").attr('name');
        var experience_to_date_name = $("[data-repeater-list=work_experiences___form] [data-repeater-item]:last-child .experience_to").attr('name');

        $('form [name="'+experience_from_date_name+'"]').datepicker({
            format: "dd-mm-yyyy",
            autoclose: true,
            endDate: "today"
        }).on('changeDate', function() {
            $('form [name="'+experience_to_date_name+'"]').datepicker('setStartDate', $(this).val());
        });

        $('form [name="'+experience_to_date_name+'"]').datepicker({
            format: "dd-mm-yyyy",
            autoclose: true,
            endDate: "today"
        }).on('changeDate', function() {
            $('form [name="'+experience_from_date_name+'"]').datepicker('setEndDate', $(this).val());
        });

    },

    hide: function(deleteElement) {                 
        if(confirm('Are you sure you want to delete this element?')) {
            $(this).slideUp(deleteElement);
        }
    }      
});

$('input[name^="work_experiences___form"][name$="[experience_from]"]').datepicker({
    format: "dd-mm-yyyy",
    autoclose: true,
    endDate: "today"
}).on('changeDate', function() {    
    $(this).closest('.row').find('.experience_to').datepicker('setStartDate', $(this).val());
});

$('input[name^="work_experiences___form"][name$="[experience_to]"]').datepicker({
    format: "dd-mm-yyyy",
    autoclose: true,
    endDate: "today"
}).on('changeDate', function() {
    $(this).closest('.row').find('.experience_from').datepicker('setEndDate', $(this).val());
});

$('#reference-contact___form').repeater({
    initEmpty: false,
    
    defaultValues: {
        'text-input': 'foo'
    },

    // isFirstItemUndeletable: true,
        
    show: function() {
        $(this).slideDown();

        $(".numeric").ForceNumericOnly();
    },

    hide: function(deleteElement) {                 
        if(confirm('Are you sure you want to delete this element?')) {
            $(this).slideUp(deleteElement);
        }
    }      
});

$('#preferred_location').select2({
    placeholder: "Select Preferred Location"
});

$('#department').select2({
    placeholder: "Select Department"
});

