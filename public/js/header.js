const border_circle = document.getElementById('border_circle');
const personal = document.getElementById('personall');
border_circle.addEventListener('mouseenter', () => {
    personal.style.display = 'block';
});
personal.addEventListener('mouseleave', () => {
    personal.style.display = 'none';
});
