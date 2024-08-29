function validateForm() {
	const namaInput = document.getElementById('nama');
	const emailInput = document.querySelector('input[name="input"]');
	const messageInput = document.querySelector('textarea[name="message"]');
	const emailError = document.getElementById('emailError');
	let isValid = true;
  
	if (namaInput.value.trim() === '') {
	  displayErrorMessage(namaInput, 'Nama harus diisi');
	  isValid = false;
	} else {
	  hideErrorMessage(namaInput);
	}
  
	if (emailInput.value.trim() === '') {
	  displayErrorMessage(emailInput, 'Email harus diisi');
	  isValid = false;
	} else if (!validateEmail(emailInput.value)) {
	  displayErrorMessage(emailInput, 'Email tidak valid');
	  isValid = false;
	} else {
	  hideErrorMessage(emailInput);
	}
  
	if (messageInput.value.trim() === '') {
	  displayErrorMessage(messageInput, 'Pesan harus diisi');
	  isValid = false;
	} else {
	  hideErrorMessage(messageInput);
	}
  
	if (isValid) {
	  // Lakukan tindakan lain jika formulir valid
	  // Contoh: Kirim formulir atau lakukan tindakan lainnya
	  alert('Formulir telah dikirim');
	}
  }
  
  function displayErrorMessage(input, message) {
	const errorMessage = input.parentNode.querySelector('.error-message');
	if (errorMessage) {
	  errorMessage.innerText = message;
	  errorMessage.style.display = 'block';
	} else {
	  const newErrorMessage = document.createElement('span');
	  newErrorMessage.classList.add('error-message');
	  newErrorMessage.innerText = message;
	  input.parentNode.appendChild(newErrorMessage);
	}
  }
  
  function hideErrorMessage(input) {
	const errorMessage = input.parentNode.querySelector('.error-message');
	if (errorMessage) {
	  errorMessage.style.display = 'none';
	}
  }
  
  function validateEmail(email) {
	// RegEx untuk validasi email
	const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
	return emailPattern.test(email);
  }
  