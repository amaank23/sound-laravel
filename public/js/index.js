const drop = document.getElementById('drop-login');
const targetDrop = document.getElementsByClassName('dropdown-acc')[0];
let clicked = false;
drop.addEventListener('click', () => {
    if(clicked)  {
        targetDrop.style.display = 'none'
        clicked = false;
        return;
    }
    targetDrop.style.display = 'block';
    clicked = true;
})