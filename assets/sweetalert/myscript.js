const flashData = $('.flash-data').data('flashdata');
console.log(flashData);

if (flashData) {
	Swal.fire(
		'Congratulation!',
		'User account has been created!',
		'success'
	)
}

const alertData = $('.flash-wrongusername').data('flashdata');
console.log(alertData);

if (alertData) {
	Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'Wrong Username!'
	})
}

const wrongData = $('.flash-wrongpassword').data('flashdata');
console.log(wrongData);

if (wrongData) {
	Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'Wrong Password!'
	})
}

const wrongForgot = $('.flash-forgot').data('flashdata');
console.log(wrongForgot);

if (wrongForgot) {
	Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'Email is not registered!'
	})
}

const checkEmail = $('.flash-checkemail').data('flashdata');
console.log(checkEmail);

if (checkEmail) {
	Swal.fire(
		'Success!',
		'Please check your email!',
		'success'
	)
}

const successChange = $('.flash-change').data('flashdata');
console.log(successChange);

if (successChange) {
	Swal.fire(
		'Success!',
		'Password has been change, Please login!',
		'success'
	)
}

const logoutData = $('.flash-logout').data('flashdata');
console.log(logoutData);

if (logoutData) {
	Swal.fire(
		'Success!',
		'You have been logged out!',
		'success'
	)
}

const locationCreate = $('.flash-dataloc').data('flashdata');
console.log(locationCreate);

if (locationCreate) {
	Swal.fire(
		'Success!',
		'Location has been created!',
		'success'
	)
}

const locationUpdate = $('.flash-updateloc').data('flashdata');
console.log(locationUpdate);

if (locationUpdate) {
	Swal.fire(
		'Success!',
		'Location has been updated!',
		'success'
	)
}

const wrongPass = $('.flash-changepass').data('flashdata');
console.log(wrongPass);

if (wrongPass) {
	Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'Wrong Current Password!'
	})
}

const wrongNewpass = $('.flash-wrongnewpass').data('flashdata');
console.log(wrongNewpass);

if (wrongNewpass) {
	Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'New password cannot be the same as current password!'
	})
}

const changePass = $('.flash-successpass').data('flashdata');
console.log(changePass);

if (changePass) {
	Swal.fire(
		'Success!',
		'Your password hass been changed!',
		'success'
	)
}

$('.delete-user').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
		if (result.isConfirmed) {
			document.location.href = href;
		}
	})
});

const userEdit = $('.flash-edituser').data('flashdata');
console.log(userEdit);

if (userEdit) {
	Swal.fire(
		'Success!',
		'Your profile has been changed!',
		'success'
	)
}

const createCounter = $('.flash-datacounter').data('flashdata');
console.log(createCounter);

if (createCounter) {
	Swal.fire(
		'Success!',
		'Counter number has been created!',
		'success'
	)
}

const updateCounter = $('.flash-counterupdate').data('flashdata');
console.log(updateCounter);

if (updateCounter) {
	Swal.fire(
		'Success!',
		'Counter number has been changed!',
		'success'
	)
}

const addStatus = $('.flash-createstatus').data('flashdata');
console.log(addStatus);

if (addStatus) {
	Swal.fire(
		'Success!',
		'Status has been created!',
		'success'
	)
}

const addSupplier = $('.flash-createsupplier').data('flashdata');
console.log(addSupplier);

if (addSupplier) {
	Swal.fire(
		'Success!',
		'Supplier has been created!',
		'success'
	)
}

const addCoa = $('.flash-createcoa').data('flashdata');
console.log(addCoa);

if (addCoa) {
	Swal.fire(
		'Success!',
		'Chart of Account has been created!',
		'success'
	)
}

const selectDept = $('.flash-dept').data('flashdata');
console.log(selectDept);

if (selectDept) {
	Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'Please Select Department!'
	})
}

const selectLoc = $('.flash-selectloc').data('flashdata');
console.log(selectLoc);

if (selectLoc) {
	Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'Please Select Location!'
	})
}

const optionDept = $('.flash-selectdept').data('flashdata');
console.log(optionDept);

if (optionDept) {
	Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'Please Select Depertment!'
	})
}

const addPlafond = $('.flash-createplafond').data('flashdata');
console.log(addPlafond);

if (addPlafond) {
	Swal.fire(
		'Success!',
		'Plafond has been created!',
		'success'
	)
}

const noticeDeptloc = $('.flash-deptloc').data('flashdata');
console.log(noticeDeptloc);

if (noticeDeptloc) {
	Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'Department is already exist in this warehouse!'
	})
}

const topupPlafond = $('.flash-topupplafond').data('flashdata');
console.log(topupPlafond);

if (topupPlafond) {
	Swal.fire(
		'Success!',
		'Top Up was successful!',
		'success'
	)
}

const withdrawalPlafond = $('.flash-withdrawalplafond').data('flashdata');
console.log(withdrawalPlafond);

if (withdrawalPlafond) {
	Swal.fire(
		'Success!',
		'Withdrawal was successful!',
		'success'
	)
}

const limitPlafond = $('.flash-limitwithdraw').data('flashdata');
console.log(limitPlafond);

if (limitPlafond) {
	Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'The Withdrawal is bigger in comparison with Cash on Bank!'
	})
}

const updatePlafond = $('.flash-editcob').data('flashdata');
console.log(updatePlafond);

if (updatePlafond) {
	Swal.fire(
		'Success!',
		'Plafond has been updated!',
		'success'
	)
}
