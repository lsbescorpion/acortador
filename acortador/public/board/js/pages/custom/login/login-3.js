"use strict";

// Class Definition
var KTLogin = function() {
	var _buttonSpinnerClasses = 'spinner spinner-right spinner-white pr-15';

	var _handleFormSignin = function() {
		var form = KTUtil.getById('kt_login_singin_form');
		var formSubmitUrl = KTUtil.attr(form, 'action');
		var formSubmitButton = KTUtil.getById('kt_login_singin_form_submit_button');

		if (!form) {
			return;
		}

		FormValidation
		    .formValidation(
		        form,
		        {
		            fields: {
						email: {
							validators: {
								notEmpty: {
									message: 'Please, enter the email'
								},
								emailAddress: {
									message: 'The value is not a valid email address'
								}
							}
						},
						password: {
							validators: {
								notEmpty: {
									message: 'Please, enter the password'
								}
							}
						}
		            },
		            plugins: {
						trigger: new FormValidation.plugins.Trigger(),
						submitButton: new FormValidation.plugins.SubmitButton(),
	            		defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
						bootstrap: new FormValidation.plugins.Bootstrap({
						//	eleInvalidClass: '', // Repace with uncomment to hide bootstrap validation icons
						//	eleValidClass: '',   // Repace with uncomment to hide bootstrap validation icons
						})
		            }
		        }
		    )
		    .on('core.form.valid', function() {
				// Show loading state on button
				KTUtil.btnWait(formSubmitButton, _buttonSpinnerClasses, "Please wait...");

				// Simulate Ajax request
				setTimeout(function() {
					KTUtil.btnRelease(formSubmitButton);
				}, 2000);

		    })
			.on('core.form.invalid', function() {
				KTUtil.scrollTop();
				$('.invalid-feedback').html('');
		    });
    }

	var _handleFormForgot = function() {
		var form = KTUtil.getById('kt_login_forgot_form');
		var formSubmitUrl = KTUtil.attr(form, 'action');
		var formSubmitButton = KTUtil.getById('kt_login_forgot_form_submit_button');

		if (!form) {
			return;
		}

		FormValidation
		    .formValidation(
		        form,
		        {
		            fields: {
						email: {
							validators: {
								notEmpty: {
									message: 'Email is required'
								},
								emailAddress: {
									message: 'The value is not a valid email address'
								}
							}
						}
		            },
		            plugins: {
						trigger: new FormValidation.plugins.Trigger(),
						submitButton: new FormValidation.plugins.SubmitButton(),
	            		defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
						bootstrap: new FormValidation.plugins.Bootstrap({
						//	eleInvalidClass: '', // Repace with uncomment to hide bootstrap validation icons
						//	eleValidClass: '',   // Repace with uncomment to hide bootstrap validation icons
						})
		            }
		        }
		    )
		    .on('core.form.valid', function() {
				// Show loading state on button
				KTUtil.btnWait(formSubmitButton, _buttonSpinnerClasses, "Please wait");

				// Simulate Ajax request
				setTimeout(function() {
					KTUtil.btnRelease(formSubmitButton);
				}, 2000);
		    })
			.on('core.form.invalid', function() {
				/*Swal.fire({
					text: "Sorry, looks like there are some errors detected, please try again.",
					icon: "error",
					buttonsStyling: false,
					confirmButtonText: "Ok, got it!",
					customClass: {
						confirmButton: "btn font-weight-bold btn-light-primary"
					}
				}).then(function() {
					KTUtil.scrollTop();
				});*/KTUtil.scrollTop();
		    });
    }

	var _handleFormSignup = function() {
		// Base elements
		var wizardEl = KTUtil.getById('kt_login');
		var form = KTUtil.getById('kt_login_signup_form');
		var formSubmitButton = KTUtil.getById('kt_login_signup_form_submit_button');
		var wizardObj;
		var validations = [];

		if (!form) {
			return;
		}

		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		validations.push(FormValidation.formValidation(
			form,
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
		// Step 1
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
					name: {
						validators: {
							notEmpty: {
								message: 'Name is required'
							}
						}
					},
					phone: {
						validators: {
							stringLength: {
	                            min: 10,
	                            max: 10,
	                            message: 'The phone number must be 10 characters long'
	                        },
	                        regexp: {
	                            regexp: /^[0-9]+$/,
	                            message: 'The phone number can only consist of number'
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
					state: {
						validators: {
							notEmpty: {
								message: 'State is required'
							}
						}
					},
					zip_code: {
						validators: {
							notEmpty: {
								message: 'Zip Code is required'
							}
						}
					},
					email: {
						validators: {
							emailAddress: {
								message: 'The value is not a valid email address'
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
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
					email_agent: {
						validators: {
							emailAddress: {
								message: 'The value is not a valid email address'
							}
						}
					},
					phone_agent: {
						validators: {
							stringLength: {
	                            min: 10,
	                            max: 10,
	                            message: 'The phone number must be 10 characters long'
	                        },
	                        regexp: {
	                            regexp: /^[0-9]+$/,
	                            message: 'The phone number can only consist of number'
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
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
					lnumber: {
						validators: {
							notEmpty: {
								message: 'Licence Number is required'
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
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
					password: {
						validators: {
							notEmpty: {
								message: 'Passsword is required'
							},
							regexp: {
	                            regexp: /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/,
	                            message: 'A minimum of characters (8), one uppercase (A-Z), one lowercase (a-z), one digit (0-9) and one characters.'
	                        }
						}
					},
					rpassword: {
						validators: {
							notEmpty: {
								message: 'Passsword is required'
							},
							identical: {
	                            compare: function() {
	                                return form.querySelector('[name="password"]').value;
	                            },
	                            message: 'The password and its confirm are not the same'
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

		/*form.querySelector('[name="password"]').addEventListener('input', function() {
	        fv.revalidateField('rpassword');
	    });*/
		// Initialize form wizard
		wizardObj = new KTWizard(wizardEl, {
			startStep: 1, // initial active step number
			clickableSteps: true // to make steps clickable this set value true and add data-wizard-clickable="true" in HTML for class="wizard" element
		});

		// Validation before going to next page
		wizardObj.on('beforeNext', function (wizard) {
			$('.email-agency').removeClass('is-invalid');
			$('.invalid-feedback-email1').text('');
			$('.invalid-feedback-owner-name').text("");
			$('.invalid-feedback-owner-lname').text("");
			$('.invalid-feedback-agent-name').text("");
			$('.invalid-feedback-agent-lname').text("");
			$('.invalid-feedback-phone-agent').text('');
			$('.invalid-feedback-phone').text('');
			$('.owner-name').removeClass('is-invalid');
			$('.owner-lname').removeClass('is-invalid');
			$('.agent-name').removeClass('is-invalid');
			$('.agent-lname').removeClass('is-invalid');
			$('#phone_agent').removeClass('is-invalid');
			$('#phone').removeClass('is-invalid');
			if(wizard.getStep() == 2) {
				if(($('#type_user').val() == 2 || $('#type_user').val() == 3) && $('.email-agency').val() == '') {
					$('.email-agency').addClass('is-invalid');
					$('.invalid-feedback-email1').text('Email is required');
					$('.email-agency').focus();
					return false;
				}
				else
				if(($('#type_user').val() == 2 || $('#type_user').val() == 3) && $('#phone').val() == '') {
					$('#phone').addClass('is-invalid');
					$('.invalid-feedback-phone').text('Phone is required');
					$('#phone').focus();
					return false;
				}
			}
			if(wizard.getStep() == 3) {
				if($('#type_user').val() == 2 || $('#type_user').val() == 3) {
					if($('.owner-name').val() == ''){
						$('.owner-name').addClass('is-invalid');
	                	$('.invalid-feedback-owner-name').text("Owner Name is required");
	                	$('.owner-name').focus();
						return false;
					}
					else
					if($('.owner-lname').val() == ''){
						$('.owner-lname').addClass('is-invalid');
	                	$('.invalid-feedback-owner-lname').text("Owner Last Name is required");
	                	$('.owner-lname').focus();
						return false;
					}
					else
					if($('.agent-name').val() == ''){
						$('.agent-name').addClass('is-invalid');
	                	$('.invalid-feedback-agent-name').text("Agent Name is required");
	                	$('.agent-name').focus();
						return false;
					}
					else
					if($('.agent-lname').val() == ''){
						$('.agent-lname').addClass('is-invalid');
	                	$('.invalid-feedback-agent-lname').text("Agent Last Name is required");
	                	$('.agent-lname').focus();
						return false;
					}
				}
				else
				if($('#type_user').val() == 1 && $('#phone_agent').val() == '') {
					$('#phone_agent').addClass('is-invalid');
					$('.invalid-feedback-phone-agent').text('Phone is required');
					$('#phone_agent').focus();
					return false;
				}
				else {
					if($('.email-agent').val() == '') {
						$('.email-agent').addClass('is-invalid');
						$('.invalid-feedback-email2').text('Email is required');
						$('.email-agent').focus();
						return false;
					}
				}
			}
			if(wizard.getStep() == 4) {
				if($('.lnumber').val() == ''){
					$('.card-licence').attr('style','display: none;');
					$('.lnumber').addClass('is-invalid');
                	$('.invalid-feedback-validate').text("Licence Number is required");
                	$('.lnumber').focus();
                	$('.fv-help-block').html('');
					return false;
				}
				else
				if($('.code').val() == '' || $('#codigo').val() == ''){
					$('.card-licence').attr('style','display: none;');
					$('.lnumber').addClass('is-invalid');
                	$('.invalid-feedback-validate').text("Licence Number or code is invalid");
                	$('.lnumber').focus();
                	$('.fv-help-block').html('');
					return false;
				}
				else
				if($('.code').val() != $('#codigo').val()) {
					$('.card-licence').attr('style','display: block;');
					$('.code').addClass('is-invalid');
                	$('.invalid-feedback-code').text("Confirmation is invalid");
                	$('.code').focus();
                	$('.fv-help-block').html('');
					return false;
				}
				else
				if($('#return_type_user').val() == 1 && ($('#type_user').val() == 2 || $('#type_user').val() == 3)) {
					$('.card-licence').attr('style','display: none;');
					$('.lnumber').addClass('is-invalid');
                	$('.invalid-feedback-validate').text("Licence Number is invalid");
                	$('.lnumber').focus();
                	$('.fv-help-block').html('');
					return false;
				}
				else
				if(($('#return_type_user').val() == 2 || $('#return_type_user').val() == 3) && $('#type_user').val() == 1 ) {
					$('.card-licence').attr('style','display: none;');
					$('.lnumber').addClass('is-invalid');
                	$('.invalid-feedback-validate').text("Licence Number is invalid");
                	$('.lnumber').focus();
                	$('.fv-help-block').html('');
					return false;
				}
				else {
					$('.code').removeClass('is-invalid');
                	$('.invalid-feedback-code').text('');
                	$('.lnumber').removeClass('is-invalid');
                	$('.invalid-feedback-validate').text('');
                	if($('#type_user').val() == 1)
                		$('.emaila').val($('.email-agent').val());
                	else
                		$('.emaila').val($('.email-agency').val());
				}
			}
			if(wizard.getStep() == 5) {
				if($('#type_user').val() == 1)
				{
					$('.des-type-user').html($('#type_user_des').val());
					$('.fname').html($('input[name=name]').val() + " " + $('input[name=lname]').val());
					$('.phone-des').html('');
					$('.address-des').html($('input[name=address]').val());
					$('.city-des').html($('input[name=city]').val());
					$('.state-des').html($('input[name=state]').val());
					$('.zipcode-des').html($('input[name=zip_code]').val());
					$('.email-agency-des').html('');
					$('.email-des').html($('input[name=email_agent]').val());
					$('.phone-agent-des').html($('input[name=phone_agent]').val());
					$('.owner-name-des').html('');
					$('.agent-name-des').html('');
					$('.licence-des').html($('input[name=lnumber]').val());
				}
				else
				{
					$('.des-type-user').html($('#type_user_des').val());
					$('.fname').html($('input[name=name]').val());
					$('.phone-des').html($('input[name=phone]').val());
					$('.address-des').html($('input[name=address]').val());
					$('.city-des').html($('input[name=city]').val());
					$('.state-des').html($('input[name=state]').val());
					$('.zipcode-des').html($('input[name=zip_code]').val());
					$('.email-agency-des').html($('input[name=email]').val());
					$('.email-des').html('');
					$('.phone-agent-des').html('');
					$('.owner-name-des').html($('input[name=owner_name]').val() + " " + $('input[name=owner_lname]').val());
					$('.agent-name-des').html($('input[name=agent_name]').val() + " " + $('input[name=agent_lname]').val());
					$('.licence-des').html($('input[name=lnumber]').val());
				}
			}
			validations[wizard.getStep() - 1].validate().then(function (status) {
				if (status == 'Valid') {
					wizardObj.goNext();
					KTUtil.scrollTop();
				} else {
					KTUtil.scrollTop();
					$('.invalid-feedback-strong').html('');
					$('.invalid-feedback-email1').html('');
					$('.invalid-feedback-email2').html('');
					$('.invalid-feedback-validate').html('');
					$('.invalid-feedback-code').html('');
					$('.invalid-feedback-strong').html('');
				}
			});

			wizardObj.stop();  // Don't go to the next step
		});

		// Change event
		wizardObj.on('change', function (wizard) {
			KTUtil.scrollTop();
			$('.invalid-feedback-validate').html('');
		});
    }

    // Public Functions
    return {
        init: function() {
            _handleFormSignin();
			_handleFormForgot();
			_handleFormSignup();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    KTLogin.init();
});
