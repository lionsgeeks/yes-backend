let menu = document.querySelector('.myMenu');
let sidebar = document.getElementById('sidebar');

let isClicked = false
menu.addEventListener('click', (e) => {
    isClicked = !isClicked   
    sidebar.style.display = isClicked ? 'flex' : 'none';
})



