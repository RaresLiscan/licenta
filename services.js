// JavaScript source code
let previewContainer = document.querySelector('.services-preview');
let previewBox = previewContainer.querySelectorAll('.preview');

document.querySelectorAll('.services-container .service').forEach(service => {
    service.onclick = () => {
        previewContainer.style.display = 'flex';
        let name = service.getAttribute('');
        previewBox.forEach(preview => {
            let target = preview.getAttribute('');
            if (name == target) {
                preview.classList.add('active');
            }
        });
    };
});

previewBox.forEach(close => {
    close.querySelector('.fa-times').onclick = () => {
        close.classList.remove('active');
        previewContainer.style.display = 'none';
    };
});