"use strict";
/*
// Class definition
var KTWizard3 = function () {
	// Base elements
	var _wizardEl;
	var _formEl;
	var _wizard;
	var _validations = [];

	// Private functions
	var initWizard = function () {
		// Initialize form wizard
		_wizard = new KTWizard(_wizardEl, {
			startStep: 1, // initial active step number
			clickableSteps: true  // allow step clicking
		});

		// Validation before going to next page
		_wizard.on('beforeNext', function (wizard) {
			// Don't go to the next step yet
			_wizard.stop();

			// Validate form
			var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step
			validator.validate().then(function (status) {
				if (status == 'Valid') {
					_wizard.goNext();
					KTUtil.scrollTop();
				} else {
					Swal.fire({
						text: "Sorry, looks like there are some errors detected, please try again.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn font-weight-bold btn-light"
						}
					}).then(function () {
						KTUtil.scrollTop();
					});
				}
			});
		});

		// Change event
		_wizard.on('change', function (wizard) {
			KTUtil.scrollTop();
		});
	}

	var initValidation = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		// Step 1
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					address1: {
						validators: {
							notEmpty: {
								message: 'Address is required'
							}
						}
					},
					postcode: {
						validators: {
							notEmpty: {
								message: 'Postcode is required'
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
					state: {
						validators: {
							notEmpty: {
								message: 'State is required'
							}
						}
					},
					country: {
						validators: {
							notEmpty: {
								message: 'Country is required'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		));

		// Step 2
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					package: {
						validators: {
							notEmpty: {
								message: 'Package details is required'
							}
						}
					},
					weight: {
						validators: {
							notEmpty: {
								message: 'Package weight is required'
							},
							digits: {
								message: 'The value added is not valid'
							}
						}
					},
					width: {
						validators: {
							notEmpty: {
								message: 'Package width is required'
							},
							digits: {
								message: 'The value added is not valid'
							}
						}
					},
					height: {
						validators: {
							notEmpty: {
								message: 'Package height is required'
							},
							digits: {
								message: 'The value added is not valid'
							}
						}
					},
					packagelength: {
						validators: {
							notEmpty: {
								message: 'Package length is required'
							},
							digits: {
								message: 'The value added is not valid'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		));

		// Step 3
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					delivery: {
						validators: {
							notEmpty: {
								message: 'Delivery type is required'
							}
						}
					},
					packaging: {
						validators: {
							notEmpty: {
								message: 'Packaging type is required'
							}
						}
					},
					preferreddelivery: {
						validators: {
							notEmpty: {
								message: 'Preferred delivery window is required'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		));

		// Step 4
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					locaddress1: {
						validators: {
							notEmpty: {
								message: 'Address is required'
							}
						}
					},
					locpostcode: {
						validators: {
							notEmpty: {
								message: 'Postcode is required'
							}
						}
					},
					loccity: {
						validators: {
							notEmpty: {
								message: 'City is required'
							}
						}
					},
					locstate: {
						validators: {
							notEmpty: {
								message: 'State is required'
							}
						}
					},
					loccountry: {
						validators: {
							notEmpty: {
								message: 'Country is required'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		));
	}

	return {
		// public functions
		init: function () {
			_wizardEl = KTUtil.getById('kt_wizard_v3');
			_formEl = KTUtil.getById('kt_form');

			initWizard();
			initValidation();
		}
	};
}();

jQuery(document).ready(function () {
	KTWizard3.init();
});

*/



// Class definition
var KTWizard3 = function () {
	// Base elements
	var _wizardEl;
	var _formEl;
	var _wizard;
	var _validations = [];

	// Private functions
	var initWizard = function () {
		// Initialize form wizard
		_wizard = new KTWizard(_wizardEl, {
			startStep: 1, // initial active step number
			clickableSteps: true  // allow step clicking
		});
		
		// Validation before going to next page
		_wizard.on('beforeNext', function (wizard) {
			// Don't go to the next step yet
			_wizard.stop();

			// Validate form
			var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step
			validator.validate().then(function (status) {
				if (status == 'Valid') {
					_wizard.goNext();
					KTUtil.scrollTop();
				} else {
					Swal.fire({
						text: "Sorry, looks like there are some errors detected, please try again.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn font-weight-bold btn-light"
						}
					}).then(function () {
						KTUtil.scrollTop();
					});
				}
			});

			if (wizard.getStep() == 4) {
				var broad_area = $('#broad_area_id option:selected').text();
				$('#preview_broad_area').text(broad_area);

				var priority_area = $('#priority_area_id option:selected').text();
				$('#preview_priority_area').text(priority_area);

				var project_title = $('#title').val();
				$('#preview_project_title').text(project_title);

				var start_date = $('#start_date').val();
				$('#preview_start_date').text(start_date);

				var end_date = $('#end_date').val();
				$('#preview_end_date').text(end_date);

				let pi_html = '';
				let pi__form = $('#pi__form').repeaterVal();
				$.each(pi__form, function (pis_key, pis) {
					$.each(pis, function(pi_key, pi) {
						pi_html += '<p>Sr No: ' + ++pi_key + '</p>';
						pi_html += '<p>Name: ' + pi['pi_name'] + '</p>';
						pi_html += '<p>Designation: ' + pi['pi_designation'] + '</p>';
						pi_html += '<p>Mobile No: ' + pi['pi_mobile'] + '</p>';
						pi_html += '<p>Email: ' + pi['pi_email'] + '</p>';
						pi_html += '<p>Name of Department / College: ' + pi['pi_department'] + '</p>';
						pi_html += '<p>Institution / University: ' + pi['pi_institution'] + '</p>';
						pi_html += '<p>Address: ' + pi['pi_address'] + '</p>';
						pi_html += '<br/>';
					});
				});
				$('#preview_pi').html(pi_html);

				let co_pi_html = '';
				let co_pi__form = $('#co-pi__form').repeaterVal();
				$.each(co_pi__form, function (co_pis_key, co_pis) {
					$.each(co_pis, function(co_pi_key, co_pi) {
						//if (co_pi['co_pi_name'] != '' && co_pi['co_pi_designation'] != '' && co_pi['co_pi_mobile'] != '' && co_pi['co_pi_email'] != '' && co_pi['co_pi_department'] != '' && co_pi['co_pi_institution'] != '' && co_pi['co_pi_address'] != '') {
						if (co_pi['co_pi_name'] == '' && co_pi['co_pi_designation'] == '' && co_pi['co_pi_mobile'] == '' && co_pi['co_pi_email'] == '' && co_pi['co_pi_department'] == '' && co_pi['co_pi_institution'] == '' && co_pi['co_pi_address'] == '') {
							return;
						}
						co_pi_html += '<p>Sr No: ' + ++co_pi_key + '</p>';
						co_pi_html += '<p>Name: ' + co_pi['co_pi_name'] + '</p>';
						co_pi_html += '<p>Designation: ' + co_pi['co_pi_designation'] + '</p>';
						co_pi_html += '<p>Mobile No: ' + co_pi['co_pi_mobile'] + '</p>';
						co_pi_html += '<p>Email: ' + co_pi['co_pi_email'] + '</p>';
						co_pi_html += '<p>Name of Department / College: ' + co_pi['co_pi_department'] + '</p>';
						co_pi_html += '<p>Institution / University: ' + co_pi['co_pi_institution'] + '</p>';
						co_pi_html += '<p>Address: ' + co_pi['co_pi_address'] + '</p>';
						co_pi_html += '<br/>';	
					});
				});
				$('#preview_co_pi').html(co_pi_html);
				
				var origin_of_proposal = $('#origin_of_proposal').val();
				$('#preview_origin_of_proposal').html(origin_of_proposal);

				var defination_of_problem = $('#defination_of_problem').val();
				$('#preview_defination_of_problem').html(defination_of_problem);

				var short_term_objectives = $('#short_term_objectives').val();
				$('#preview_short_term_objectives').html(short_term_objectives);

				var long_term_objectives = $('#long_term_objectives').val();
				$('#preview_long_term_objectives').html(long_term_objectives);

				var practical_utility = $('#practical_utility').val();
				$('#preview_practical_utility').html(practical_utility);

				var user_target_group = $('#user_target_group').val();
				$('#preview_user_target_group').html(user_target_group);

				var collaborative_organization_details = $('#collaborative_organization_details').val();
				$('#preview_collaborative_organization_details').html(collaborative_organization_details);

				var methodology = $('#methodology').val();
				$('#preview_methodology').html(methodology);

				var suggested_plan_of_action = $('#suggested_plan_of_action').val();
				$('#preview_suggested_plan_of_action').html(suggested_plan_of_action);

				var anticipated_output_of_the_project = $('#anticipated_output_of_the_project').val();
				$('#preview_anticipated_output_of_the_project').html(anticipated_output_of_the_project);

				let tasks_html = '';
				let tasks__form = $('#project-tasks__form').repeaterVal();
				$.each(tasks__form, function (tasks_key, tasks) {
					$.each(tasks, function(task_key, task) {
						tasks_html += '<p>Task: ' + task['task'] + '</p>';
						tasks_html += '<p>Start Date: ' + task['start_date'] + '</p>';
						tasks_html += '<p>End Date: ' + task['end_date'] + '</p>';
						tasks_html += '<br/>';
					});
				});
				$('#preview_tasks').html(tasks_html);

				// let formData = {};
				// let inputs = $('#project_form').serializeArray();

				
				//console.log(inputs)

				console.log('after');


				//console.log($('#pi__form').repeaterVal());
				/*
				$('input[name*="pi__form"]').each(function(e)
				{
					console.log($(this).attr('name'));
					console.log($(this).val());
				});
				$.each(inputs, function (i, input) {
					formData[input.name] = input.value;
				});
				console.log(formData)
				*/

				
			}
		});
		
		// Change event
		_wizard.on('change', function (wizard) {
			
			//alert(wizard.getStep());
			KTUtil.scrollTop();
		});

		// _wizard.on('changed', function (wizard) {
		// 	alert(1)
		// });
	}

	var initValidation = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/

		// Step 1
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					/*
					broad_area_id: {
						validators: {
							notEmpty: {
								message: 'Broad area is required'
							}
						}
					},
					priority_area_id: {
						validators: {
							notEmpty: {
								message: 'Priority area is required'
							}
						}
					},
					title: {
						validators: {
							notEmpty: {
								message: 'Project title is required'
							}
						}
					},
					start_date: {
						validators: {
							notEmpty: {
								message: 'Start date is required'
							}
						}
					},
					end_date: {
						validators: {
							notEmpty: {
								message: 'End date is required'
							}
						}
					},
					'pi__form[0][pi_name]': {
						validators: {
							notEmpty: {
								message: 'PI name is required'
							}
						}
					},
					'pi__form[0][pi_designation]': {
						validators: {
							notEmpty: {
								message: 'PI designation is required'
							}
						}
					},
					'pi__form[0][pi_mobile]': {
						validators: {
							notEmpty: {
								message: 'PI mobile number is required'
							}
						}
					},
					'pi__form[0][pi_email]': {
						validators: {
							notEmpty: {
								message: 'PI email address is required'
							}
						}
					},
					'pi__form[0][pi_department]': {
						validators: {
							notEmpty: {
								message: 'PI department is required'
							}
						}
					},
					'pi__form[0][pi_institution]': {
						validators: {
							notEmpty: {
								message: 'PI institution is required'
							}
						}
					},
					'pi__form[0][pi_address]': {
						validators: {
							notEmpty: {
								message: 'PI address is required'
							}
						}
					}
					*/
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		));

		// Step 2
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					/*
					origin_of_proposal: {
						validators: {
							notEmpty: {
								message: 'Origin of Proposal is required'
							}
						}
					},
					defination_of_problem: {
						validators: {
							notEmpty: {
								message: 'Defination of Problem is required'
							}
						}
					},
					short_term_objectives: {
						validators: {
							notEmpty: {
								message: 'Short Term Objectives is required'
							}
						}
					},
					long_term_objectives: {
						validators: {
							notEmpty: {
								message: 'Long Term Objectives is required'
							}
						}
					},
					practical_utility: {
						validators: {
							notEmpty: {
								message: 'Practical Utility is required'
							}
						}
					},
					user_target_group: {
						validators: {
							notEmpty: {
								message: 'User Target Group is required'
							}
						}
					},
					collaborative_organization_details: {
						validators: {
							notEmpty: {
								message: 'Collaborative Organization Details is required'
							}
						}
					}
					*/
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		));

		// Step 3
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					/*
					methodology: {
						validators: {
							notEmpty: {
								message: 'Methodology is required'
							}
						}
					},
					suggested_plan_of_action: {
						validators: {
							notEmpty: {
								message: 'Suggested Plan of Action is required'
							}
						}
					},
					anticipated_output_of_the_project: {
						validators: {
							notEmpty: {
								message: 'Anticipated Output of the Project is required'
							}
						}
					},
					'project_tasks__form[0][task]': {
						validators: {
							notEmpty: {
								message: 'Task is required'
							}
						}
					},
					'project_tasks__form[0][start_date]': {
						validators: {
							notEmpty: {
								message: 'Start date is required'
							}
						}
					},
					'project_tasks__form[0][end_date]': {
						validators: {
							notEmpty: {
								message: 'End date is required'
							}
						}
					},
					'institutes__form[0][institute_name]': {
						validators: {
							notEmpty: {
								message: 'Institute Name is required'
							}
						}
					},
					'institutes__form[0][institute_address]': {
						validators: {
							notEmpty: {
								message: 'Institute address is required'
							}
						}
					},
					'institutes__form[0][proposed_research_aspects]': {
						validators: {
							notEmpty: {
								message: 'Proposed Research Aspects is required'
							}
						}
					},
					'institutes__form[0][proposed_amount]': {
						validators: {
							notEmpty: {
								message: 'Proposed Amount is required'
							}
						}
					},
					*/
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		));

		// Step 4
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					/*
					'non_recurring__form[0][details]': {
						validators: {
							notEmpty: {
								message: 'Details is required'
							}
						}
					},
					'non_recurring__form[0][year1]': {
						validators: {
							notEmpty: {
								message: 'Year I is required'
							}
						}
					},
					'non_recurring__form[0][year2]': {
						validators: {
							notEmpty: {
								message: 'Year II is required'
							}
						}
					},
					'non_recurring__form[0][year3]': {
						validators: {
							notEmpty: {
								message: 'Year III is required'
							}
						}
					},

					'recurring_manpower__form[0][details]': {
						validators: {
							notEmpty: {
								message: 'Details is required'
							}
						}
					},
					'recurring_manpower__form[0][year1]': {
						validators: {
							notEmpty: {
								message: 'Year I is required'
							}
						}
					},
					'recurring_manpower__form[0][year2]': {
						validators: {
							notEmpty: {
								message: 'Year II is required'
							}
						}
					},
					'recurring_manpower__form[0][year3]': {
						validators: {
							notEmpty: {
								message: 'Year III is required'
							}
						}
					},

					'recurring_consumables__form[0][details]': {
						validators: {
							notEmpty: {
								message: 'Details is required'
							}
						}
					},
					'recurring_consumables__form[0][year1]': {
						validators: {
							notEmpty: {
								message: 'Year I is required'
							}
						}
					},
					'recurring_consumables__form[0][year2]': {
						validators: {
							notEmpty: {
								message: 'Year II is required'
							}
						}
					},
					'recurring_consumables__form[0][year3]': {
						validators: {
							notEmpty: {
								message: 'Year III is required'
							}
						}
					},

					'others_travel__form[0][details]': {
						validators: {
							notEmpty: {
								message: 'Details is required'
							}
						}
					},
					'others_travel__form[0][year1]': {
						validators: {
							notEmpty: {
								message: 'Year I is required'
							}
						}
					},
					'others_travel__form[0][year2]': {
						validators: {
							notEmpty: {
								message: 'Year II is required'
							}
						}
					},
					'others_travel__form[0][year3]': {
						validators: {
							notEmpty: {
								message: 'Year III is required'
							}
						}
					},
					
					'others_contingency__form[0][details]': {
						validators: {
							notEmpty: {
								message: 'Details is required'
							}
						}
					},
					'others_contingency__form[0][year1]': {
						validators: {
							notEmpty: {
								message: 'Year I is required'
							}
						}
					},
					'others_contingency__form[0][year2]': {
						validators: {
							notEmpty: {
								message: 'Year II is required'
							}
						}
					},
					'others_contingency__form[0][year3]': {
						validators: {
							notEmpty: {
								message: 'Year III is required'
							}
						}
					},
					*/
					/*
					locaddress1: {
						validators: {
							notEmpty: {
								message: 'Address is required'
							}
						}
					},
					locpostcode: {
						validators: {
							notEmpty: {
								message: 'Postcode is required'
							}
						}
					},
					loccity: {
						validators: {
							notEmpty: {
								message: 'City is required'
							}
						}
					},
					locstate: {
						validators: {
							notEmpty: {
								message: 'State is required'
							}
						}
					},
					loccountry: {
						validators: {
							notEmpty: {
								message: 'Country is required'
							}
						}
					}
					*/
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		));
	}

	return {
		// public functions
		init: function () {
			_wizardEl = KTUtil.getById('project_wizard');
			_formEl = KTUtil.getById('project_form');

			initWizard();
			initValidation();
		}
	};
}();

jQuery(document).ready(function () {
	KTWizard3.init();
});

