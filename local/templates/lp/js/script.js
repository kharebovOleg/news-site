
  async function handleFormSubmit(event)
  {
      event.preventDefault();
      const formData = new FormData(applicantForm);
      fetch('form.handler.php', { method: 'POST', body: formData })
          .then(response => response.text())
          .then(responseText => {
            if(responseText.startsWith('Форма успешно отправлена:')) {
                document.querySelector('.inputs').classList.add('hidden');
                document.querySelector('.form_button').classList.add('hidden');
                document.querySelector('.succes_submit').classList.remove('hidden');
            } else if(responseText == 'Пожалуйста, введите верное имя.') {
                document.querySelector('.name_validation_error').classList.remove('hidden');
            } else if(responseText == 'Пожалуйста, введите действительный номер телефона.') {
                document.querySelector('.phone_validation_error').classList.remove('hidden');
            }
          })
          .catch(error => console.error('Ошибка:', error));
      applicantForm.reset();
  }
  
  const applicantForm = document.getElementById('feedback');
  applicantForm.addEventListener('submit', handleFormSubmit);


// document.querySelector('.inputs').classList.add('hidden');
// document.querySelector('.succes_submit').classList.remove('hidden');


// async function handleFormSubmit(event)
// {
//     event.preventDefault();
//     const formData = new FormData(applicantForm);
//     fetch('form.handler.php', { method: 'POST', body: formData })
//         .then(response => response.text())
//         .then(responseText => alert(responseText))
//         .catch(error => console.error('Ошибка:', error));
//     applicantForm.reset();
// }