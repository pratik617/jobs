var validator;

const demoForm = document.getElementById('requirement__form');

// Get the submit button element
const submitButton = demoForm.querySelector('[type="submit"]');

// Class definition
var KTFormControls = function () {
    // Private functions
    var _initForm = function () {
        validator = FormValidation.formValidation(
            document.getElementById('requirement__form'),
            {
                fields: {
                    
                    first_name: {
                        validators: {
                            notEmpty: {
                                message: 'First Name is required'
                            }
                        }
                    },
                    last_name: {
                        validators: {
                            notEmpty: {
                                message: 'Last Name is required'
                            }
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'Email Address is required'
                            },
                            emailAddress: {
								message: 'Email Address must be a valid email address.'
							}
                        }
                    },
                    mobile_number: {
                        validators: {
                            notEmpty: {
                                message: 'Mobile No is required'
                            }
                        }
                    },
                    designation: {
                        validators: {
                            notEmpty: {
                                message: 'Designation is required'
                            }
                        }
                    },
                    date_of_birth: {
                        validators: {
                            notEmpty: {
                                message: 'Date of Birth is required'
                            }
                        }
                    },
                    gender: {
                        validators: {
                            notEmpty: {
                                message: 'Gender is required'
                            }
                        }
                    },
                    marital_staus: {
                        validators: {
                            notEmpty: {
                                message: 'Marital Staus is required'
                            }
                        }
                    },
                    address1: {
                        validators: {
                            notEmpty: {
                                message: 'Address1 is required'
                            }
                        }
                    },
                    state: {
                        validators: {
                            notEmpty: {
                                message: 'State is required'
                            }
                        }
                    },
                    city: {
                        validators: {
                            notEmpty: {
                                message: 'City is required'
                            }
                        }
                    },
                    pincode: {
                        validators: {
                            notEmpty: {
                                message: 'Pincode is required'
                            }
                        }
                    },
                    preferred_location: {
                        validators: {
                            notEmpty: {
                                message: 'Preferred Location is required'
                            }
                        }
                    },
                    department: {
                        validators: {
                            notEmpty: {
                                message: 'Department is required'
                            }
                        }
                    },
                    notice_period: {
                        validators: {
                            notEmpty: {
                                message: 'Notice Period is required'
                            }
                        }
                    },
                    expected_ctc: {
                        validators: {
                            notEmpty: {
                                message: 'Expected CTC is required'
                            }
                        }
                    },
                    current_ctc: {
                        validators: {
                            notEmpty: {
                                message: 'Current CTC is required'
                            }
                        }
                    },
					'work_experiences___form[0][company_name]': {
						validators: {
							notEmpty: {
								message: 'Company Name is required'
							}
						}
                    },
					'work_experiences___form[0][designation]': {
						validators: {
							notEmpty: {
								message: 'Designation is required'
							}
						}
                    },
					'work_experiences___form[0][experience_from]': {
						validators: {
							notEmpty: {
								message: 'Experience From Date is required'
							}
						}
                    },
					'work_experiences___form[0][experience_to]': {
						validators: {
							notEmpty: {
								message: 'Experience To Date is required'
							}
						}
                    },
					'languages': {
						validators: {
							notEmpty: {
								message: 'Language Proficiency is required'
							}
						}
                    },


                },
                
                plugins: { //Learn more: https://formvalidation.io/guide/plugins
                    trigger: new FormValidation.plugins.Trigger(),
                    // Bootstrap Framework Integration
                    // bootstrap: new FormValidation.plugins.Bootstrap(),
                    // Validate fields when clicking the Submit button
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    // Bootstrap Framework Integration
                    bootstrap: new FormValidation.plugins.Bootstrap({
                        eleInvalidClass: '',
                        eleValidClass: '',
                    })
                }
            }
        )
        .on('core.form.invalid', function(e) {
            Swal.fire({
                // text: "Sorry, looks like there are some errors detected, please try again.",
                text: "Please fill up the required fields.",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn font-weight-bold btn-light"
                }
            }).then(function () {
                KTUtil.scrollTop();
            });
        })
        .on('core.form.valid', function(e) {
            

            window.onbeforeunload = null;
            demoForm.submit();
        });
    }

    return {
        // public functions
        init: function() {
            _initForm();
        }
    };
}();

jQuery(document).ready(function() {
    KTFormControls.init();
});

