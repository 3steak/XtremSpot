
// MODAL REPORT.HTML for mail after delete in signalement
const deleteMailModal = document.getElementById('deleteMailModal')
deleteMailModal.addEventListener('show.bs.modal', event => {
  // Button that triggered the modal
  const button = event.relatedTarget
  // Extract info from data-bs-* attributes
  const userName = button.getAttribute('data-bs-whatever')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  const modalTitle = deleteMailModal.querySelector('.modal-title')


  const modalForm = deleteMailModal.querySelector('.modal-body')

  modalTitle.textContent = `Mail pour ${userName}`
  // I WILL CHANGE VALUE OF MAILTO "user.mail"

  let formMail = ` 
    <!-- Wrapper container -->
    <div class="container py-4">
    
      <!-- Bootstrap 5 starter form -->
      <form id="contactForm">
    
        <!-- Name input -->
        <div class="mb-3">
          <label class="form-label" for="name">Name</label>
          <input class="form-control" id="name" type="text" placeholder="Name" value="${userName}"/>
        </div>
    
        <!-- Email address input -->
        <div class="mb-3">
          <label class="form-label" for="emailAddress">Email Address</label>
          <input class="form-control" id="emailAddress" type="email" placeholder="Email Address" value="${userName}.email"/>
        </div>
    
        <!-- Message input -->
        <div class="mb-3">
          <label class="form-label" for="message">Message</label>
          <textarea class="form-control" id="message" type="text" placeholder="Message" style="height: 10rem;"></textarea>
        </div>
    
        <!-- Form submit button -->
        <div class="d-grid">
          <button class="btn btn-primary btn-lg" type="submit">Submit</button>
        </div>
    
      </form>
    
    </div>
    
    `;

  modalForm.innerHTML = formMail
})
