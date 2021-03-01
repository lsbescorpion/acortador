"use strict";

// Class definition
var KTWizard2 = function () {
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
			clickableSteps: true // to make steps clickable this set value true and add data-wizard-clickable="true" in HTML for class="wizard" element
		});

		// Validation before going to next page
		_wizard.on('beforeNext', function (wizard) {
			// Don't go to the next step yet
			$('.invalid-feedback-div').text('');
			$('.address').removeClass('is-invalid');
        	$('.invalid-feedback-email').text('');
			_wizard.stop();

			// Validate form
			if(wizard.getStep() == 2) {
				$('.emaila').val($('.email').val());
			}
			else
			if(wizard.getStep() == 3) {
				var type = ($('#type_user').val() != 2 ? $('input[name=name]').val() + " " + $('input[name=lname]').val() : $('input[name=name]').val());
				$('.des-type-user').html($('#type_user_des').val());
				$('.fname').html(type);
				$('.phone-des').html($('input[name=phone]').val());
				$('.address-des').html($('input[name=address]').val());
				$('.city-des').html($('input[name=city]').val());
				$('.state-des').html($('input[name=state]').val());
				$('.zipcode-des').html($('input[name=zip_code]').val());
				$('.email-des').html($('input[name=email]').val());
			}
			var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step
			validator.validate().then(function (status) {
				if (status == 'Valid') {
					_wizard.goNext();
					KTUtil.scrollTop();
				} else {
					KTUtil.scrollTop();
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
					role: {
						validators: {
							choice: {
								min:1,
								message: 'Select the type of account'
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

		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					name: {
						validators: {
							notEmpty: {
								message: 'First name is required'
							}
						}
					},
					phone: {
						validators: {
							notEmpty: {
								message: 'Phone is required'
							},
							stringLength: {
	                            min: 10,
	                            max: 10,
	                            message: 'The phone number must be 10 characters long'
	                        },
	                        regexp: {
	                            regexp: /^[0-9]+$/,
	                            message: 'The phone number can only consist of number'
	                        }/*,
	                        phone: {
	                            message: 'The phone number is not valid',
	                            country: 'US'
	                        },*/
						}
					},
					email: {
						validators: {
							notEmpty: {
								message: 'Email is required'
							},
							emailAddress: {
								message: 'The value is not a valid email address'
							}
						}
					},
					address: {
						validators: {
							notEmpty: {
								message: 'Address is required'
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
					zip_code: {
						validators: {
							notEmpty: {
								message: 'Zip Code is required'
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
					password: {
						validators: {
							/*notEmpty: {
								message: 'Passsword is required'
							},*/
							regexp: {
	                            regexp: /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/,
	                            message: 'Please, minimum of characters (8), one uppercase (A-Z), one lowercase (a-z), one digit (0-9), one Unicode characters'
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
			_wizardEl = KTUtil.getById('kt_wizard_v2');
			_formEl = KTUtil.getById('kt_form');

			initWizard();
			initValidation();
		}
	};
}();

jQuery(document).ready(function () {
	KTWizard2.init();
});
