// JavaScript Document
var elFirstname = document.getElementById('firstname');
var elLastname = document.getElementById('lastname');
var elUsername = document.getElementById('username');
var elPassword = document.getElementById('password');
var elEmail = document.getElementById('email');
var elPhone = document.getElementById('phone');
var elComment = document.getElementById('comments')

function checkName(minLength, inputId, feedback, divId)
{ // Declare function
	var el = document.getElementById(inputId); // Get first name input
	var elMsg = document.getElementById(feedback); // Get feedback element
	var mainDiv = document.getElementById(divId);
	
	if (el.value.length < minLength)
	{ // If first name too short
		elMsg.innerHTML = inputId.toUpperCase()+' must be '+minLength+' characters or more';
		elMsg.classList.add("error-text");
		mainDiv.classList.add("has-error");
	}
	else 
	{ // Otherwise
		elMsg.innerHTML = ''; // Clear message
		mainDiv.classList.remove("has-error");
		mainDiv.classList.add("has-success");
	}
}

function checkEmail(inputId, feedback, divId)
{
	var elEmail = document.getElementById(inputId);
	var emailMsg = document.getElementById(feedback);
	var validRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	var emailDiv = document.getElementById(divId);
	
	if(elEmail.value.match(validRegex))
	{
		emailMsg.innerHTML = '';
		emailDiv.classList.remove("has-error");
		emailDiv.classList.add("has-success");
	}
	else
	{
		emailMsg.innerHTML = 'Please provide a valid email address';
		emailMsg.classList.add("error-text");
		emailDiv.classList.add("has-error");

	}
}

function checkPhone(inputId, feedback, divId)
{
	var elPhone = document.getElementById(inputId);
	var phoneMsg = document.getElementById(feedback);
	var validRegex = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
	var phoneDiv = document.getElementById(divId);
	
	if(elPhone.value.match(validRegex))
	{
		phoneMsg.innerHTML = '';
		phoneDiv.classList.remove("has-error");
		phoneDiv.classList.add("has-success");
	}
	else
	{
		phoneMsg.innerHTML = 'Please use a correct format: ex. 1234567890';
		phoneDiv.classList.add("error-text");
		phoneDiv.classList.add("has-error");	
	}
}

function checkData(minLength, inputId, feedback, divId)
{
	var elData = document.getElementById(inputId);
	var elMsgData = document.getElementById(feedback);
	var mainDivData = document.getElementById(divId);
	
	if(elData.value.length < minLength)
	{
		elMsgData.innerHTML = inputId.toUpperCase()+' must be '+minLength+' characters or more';
		elMsgData.classList.add("error-text");
		mainDivData.classList.add("has-error");
	}
	else
	{
		elMsgData.innerHTML = ''; // Clear message
		mainDivData.classList.remove("has-error");
		mainDivData.classList.add("has-success");
	}
	
	
}

function checkComments(minLength, inputId, feedback, divId)
{
	var elComment = document.getElementById(inputId);
	var elCommMsg = document.getElementById(feedback);
	var commDiv = document.getElementById(divId);
	
	if(elComment.value.length < minLength)
	{
		elComment.innerHTML = 'Please provide a comment';
		elCommMsg.classList.add("error-text");
		commDiv.classList.add("has-error");
	}
	else
	{
		elComment.innerHTML = '';
		commDiv.classList.remove("has-error");
		commDiv.classList.add("has-success");
	}
}

elFirstname.addEventListener('blur', function() {
	checkName(2, 'firstname', 'fnFeedback', 'firstNameDiv');
}, false);

elLastname.addEventListener('blur', function() {
	checkName(2, 'lastname', 'lnFeedback', 'lastNameDiv');
}, false);

elEmail.addEventListener('blur', function() {
	checkEmail('email', 'emailFeedback', 'emailDiv');
}, false);

elPhone.addEventListener('blur', function() {
	checkPhone('phone', 'phoneFeedback', 'phoneDiv');
}, false);

elUsername.addEventListener('blur', function() {
	checkData(5, 'username', 'unFeedback', 'unDiv');
}, false);

elPassword.addEventListener('blur', function() {
	checkData(8, 'password', 'pwFeedback', 'pwDiv');
}, false);

elComment.addEventListener('blur', function() {
	checkComments(1, 'comments', 'commentsFeedback', 'commentDiv');
}, false);



