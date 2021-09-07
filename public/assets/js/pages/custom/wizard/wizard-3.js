"use strict";

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

			if (wizard.getStep() == 4) {

				let non_recurring_total = 0;
				let non_recurring_html = '';
				let non_recurring__form = $('#non-recurring__form').repeaterVal();
				$.each(non_recurring__form, function (non_recurring_key, non_recurring_items) {
					$.each(non_recurring_items, function(non_recurring_key, non_recurring_item) {
						if (non_recurring_item['details'] == '' && non_recurring_item['year1'] == '' && non_recurring_item['year2'] == '' && non_recurring_item['year3'] == '') {
							return;
						}
						non_recurring_html += '<p>Details: ' + non_recurring_item['details'] + '</p>';
						non_recurring_html += '<p>Year I: ' + non_recurring_item['year1'] + '</p>';
						non_recurring_html += '<p>Year II: ' + non_recurring_item['year2'] + '</p>';
						non_recurring_html += '<p>Year III: ' + non_recurring_item['year3'] + '</p>';
						non_recurring_html += '<br/>';

						non_recurring_total += (non_recurring_item['year1'] != '') ? parseFloat(non_recurring_item['year1']) : 0;
						non_recurring_total += (non_recurring_item['year2'] != '') ? parseFloat(non_recurring_item['year2']) : 0;
						non_recurring_total += (non_recurring_item['year3'] != '') ? parseFloat(non_recurring_item['year3']) : 0;
					});
				});
				$('#preview_non_recurring').html(non_recurring_html);

				console.log('non_recurring_total => ' + non_recurring_total);

				if (non_recurring_total > 500000) {
					_wizard.stop();
					Swal.fire({
						text: "Equipment grants should not be more than Rs. 5 Lakhs / Project.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn font-weight-bold btn-light"
						}
					}).then(function () {
						KTUtil.scrollTop();
					});
					return false;
				}


				let total_contingency = 0;

				let others_travel_html = '';
				let others_travel__form = $('#others-travel__form').repeaterVal();
				$.each(others_travel__form, function (others_travel_key, others_travel_items) {
					$.each(others_travel_items, function(others_travel_key, others_travel_item) {
						if (others_travel_item['details'] == '' && others_travel_item['year1'] == '' && others_travel_item['year2'] == '' && others_travel_item['year3'] == '') {
							return;
						}
						others_travel_html += '<p>Details: ' + others_travel_item['details'] + '</p>';
						others_travel_html += '<p>Year I: ' + others_travel_item['year1'] + '</p>';
						others_travel_html += '<p>Year II: ' + others_travel_item['year2'] + '</p>';
						others_travel_html += '<p>Year III: ' + others_travel_item['year3'] + '</p>';
						others_travel_html += '<br/>';

						total_contingency += (others_travel_item['year1'] != '') ? parseFloat(others_travel_item['year1']) : 0;
						total_contingency += (others_travel_item['year2'] != '') ? parseFloat(others_travel_item['year2']) : 0;
						total_contingency += (others_travel_item['year3'] != '') ? parseFloat(others_travel_item['year3']) : 0;
					});
				});
				$('#preview_others_travel').html(others_travel_html);

				let others_contingency_html = '';
				let others_contingency__form = $('#others-contingency__form').repeaterVal();
				$.each(others_contingency__form, function (others_contingency_key, others_contingency_items) {
					$.each(others_contingency_items, function(others_contingency_key, others_contingency_item) {
						if (others_contingency_item['details'] == '' && others_contingency_item['year1'] == '' && others_contingency_item['year2'] == '' && others_contingency_item['year3'] == '') {
							return;
						}
						others_contingency_html += '<p>Details: ' + others_contingency_item['details'] + '</p>';
						others_contingency_html += '<p>Year I: ' + others_contingency_item['year1'] + '</p>';
						others_contingency_html += '<p>Year II: ' + others_contingency_item['year2'] + '</p>';
						others_contingency_html += '<p>Year III: ' + others_contingency_item['year3'] + '</p>';
						others_contingency_html += '<br/>';

						total_contingency += (others_contingency_item['year1'] != '') ? parseFloat(others_contingency_item['year1']) : 0;
						total_contingency += (others_contingency_item['year2'] != '') ? parseFloat(others_contingency_item['year2']) : 0;
						total_contingency += (others_contingency_item['year3'] != '') ? parseFloat(others_contingency_item['year3']) : 0;
					});
				});
				$('#preview_others_contingency').html(others_contingency_html);

				console.log('total_contingency => ' + total_contingency);

				let max_contingency = non_recurring_total * 0.03;
				console.log('max_contingency => ' + max_contingency);
				if (total_contingency > max_contingency) {
					_wizard.stop();
					Swal.fire({
						text: "Contingency and Travel expenditure should not be more than 3% of the project cost.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn font-weight-bold btn-light"
						}
					}).then(function () {
						KTUtil.scrollTop();
					});
					return false;
				}

				

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
						if (pi['pi_name'] == '' && pi['pi_designation'] == '' && pi['pi_mobile'] == '' && pi['pi_email'] == '' && pi['pi_department'] == '' && pi['pi_institution'] == '' && pi['pi_address'] == '') {
							return;
						}
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
						if (task['task'] == '' && task['start_date'] == '' && task['end_date'] == '') {
							return;
						}
						tasks_html += '<p>Task: ' + task['task'] + '</p>';
						tasks_html += '<p>Start Date: ' + task['start_date'] + '</p>';
						tasks_html += '<p>End Date: ' + task['end_date'] + '</p>';
						tasks_html += '<br/>';
					});
				});
				$('#preview_tasks').html(tasks_html);
				
				let institutes_html = '';
				let institutes__form = $('#institutes__form').repeaterVal();
				$.each(institutes__form, function (institutes_key, institutes) {
					$.each(institutes, function(institute_key, institute) {
						if (institute['institute_name'] == '' && institute['institute_address'] == '' && institute['proposed_research_aspects'] == '' && institute['proposed_amount'] == '' && institute['cost_sharing'] == '') {
							return;
						}
						institutes_html += '<p>Sr No: ' + ++institute_key + '</p>';
						institutes_html += '<p>Institute Name: ' + institute['institute_name'] + '</p>';
						institutes_html += '<p>Institute address: ' + institute['institute_address'] + '</p>';
						institutes_html += '<p>Proposed Research Aspects: ' + institute['proposed_research_aspects'] + '</p>';
						institutes_html += '<p>Proposed Amount: ' + institute['proposed_amount'] + '</p>';
						institutes_html += '<p>Cost Sharing: ' + institute['cost_sharing'] + '</p>';
						institutes_html += '<br/>';
					});
				});
				$('#preview_institutes').html(institutes_html);


				let recurring_manpower_html = '';
				let recurring_manpower__form = $('#recurring-manpower__form').repeaterVal();
				$.each(recurring_manpower__form, function (recurring_manpower_key, recurring_manpower_items) {
					$.each(recurring_manpower_items, function(recurring_manpower_key, recurring_manpower_item) {
						if (recurring_manpower_item['details'] == '' && recurring_manpower_item['year1'] == '' && recurring_manpower_item['year2'] == '' && recurring_manpower_item['year3'] == '') {
							return;
						}
						recurring_manpower_html += '<p>Details: ' + recurring_manpower_item['details'] + '</p>';
						recurring_manpower_html += '<p>Year I: ' + recurring_manpower_item['year1'] + '</p>';
						recurring_manpower_html += '<p>Year II: ' + recurring_manpower_item['year2'] + '</p>';
						recurring_manpower_html += '<p>Year III: ' + recurring_manpower_item['year3'] + '</p>';
						recurring_manpower_html += '<br/>';
					});
				});
				$('#preview_recurring_manpower').html(recurring_manpower_html);

				let recurring_consumables_html = '';
				let recurring_consumables__form = $('#recurring-consumables__form').repeaterVal();
				$.each(recurring_consumables__form, function (recurring_consumables_key, recurring_consumables_items) {
					$.each(recurring_consumables_items, function(recurring_consumables_key, recurring_consumables_item) {
						if (recurring_consumables_item['details'] == '' && recurring_consumables_item['year1'] == '' && recurring_consumables_item['year2'] == '' && recurring_consumables_item['year3'] == '') {
							return;
						}
						recurring_consumables_html += '<p>Details: ' + recurring_consumables_item['details'] + '</p>';
						recurring_consumables_html += '<p>Year I: ' + recurring_consumables_item['year1'] + '</p>';
						recurring_consumables_html += '<p>Year II: ' + recurring_consumables_item['year2'] + '</p>';
						recurring_consumables_html += '<p>Year III: ' + recurring_consumables_item['year3'] + '</p>';
						recurring_consumables_html += '<br/>';
					});
				});
				$('#preview_recurring_consumables').html(recurring_consumables_html);


				// let formData = {};
				// let inputs = $('#project_form').serializeArray();

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
			
			//alert(wizard.getStep());
			KTUtil.scrollTop();
		});

		// _wizard.on('changed', function (wizard) {
		// 	alert(1)
		// });
	}

	var initValidation = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		//$('#broad_area_id').each(function() {
			// $('#broad_area_id').rules("add", 
			// 	{
			// 		required: true,
			// 		messages: {
			// 			required: "Name is required",
			// 		}
			// 	});
		//});
		// Step 1
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					
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
							},
							minlength:9,
							maxlength:10,
							number: true
						}
					},
					'pi__form[0][pi_email]': {
						validators: {
							notEmpty: {
								message: 'PI email address is required'
							},
							emailAddress: {
								message: 'The value is not a valid email address'
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

			
			// $('#project_form [name*="pi_name"]').each(function() {
			// 	$(this).rules('add', {
			// 		required: true,
			// 		messages: {
			// 			required: "Please enter an address"
			// 		}
			// 	});
			// });
	
		}
	};
}();

jQuery(document).ready(function () {
	KTWizard3.init();


});

