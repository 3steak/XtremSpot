//  MODAL FOR IFRAME FEEDUSER.HTML
const mapModal = document.getElementById('mapModal')
mapModal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget
    // Extract info from data-bs-* attributes
    const recipient = button.getAttribute('data-bs-whatever')

    // Update the modal's content.
    const modalTitle = mapModal.querySelector('.modal-title')
    const modalMapIframe = mapModal.querySelector('.modal-body')

    modalTitle.textContent = `Lieu du spot de ${recipient}`
    // CHANGE VALUE OF USER'S MAP  "user.map"

    let mapUser = `<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46178.46023411916!2d-1.4276854845947582!3d43.665771804924276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd515c8004bdbfb5%3A0x10366902fd13eac9!2sLa%20Graviere!5e0!3m2!1sen!2sfr!4v1672045459326!5m2!1sen!2sfr"
width="auto" height="300" style="border:0;"allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>`;

    modalMapIframe.innerHTML = mapUser
})


