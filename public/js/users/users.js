
const editButtons = document.querySelectorAll('.editBtn');
editButtons.forEach(button => {
    button.addEventListener('click', function() {
        const textareaId = this.getAttribute('data-textarea-id');
        const textarea = document.getElementById(textareaId);
        textarea.readOnly = !textarea.readOnly;
        textarea.classList.toggle('locked');
    });
});