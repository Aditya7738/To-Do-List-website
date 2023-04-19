//select toggle password icon and password input field using the querySelector() method
const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#password");

// attach event listener to the togglePassword icon and toggle type attribute of the password field aas well as class of icon
togglePassword.addEventListener("click", function (e) {

	//toggle the type attribute
	const type = password.getAttribute("type") === "password" ? "text" : "password";
	password.setAttribute("type", type);

	//toggle the eye/eye slash icon
	this.classList.toggle("fa-eye-slash");
});

