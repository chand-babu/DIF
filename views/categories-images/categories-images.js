/* const buttons = document.querySelectorAll('.project');
const overlay = document.querySelector('.overlay');
const overlayImage = document.querySelector('.overlay__inner img');

function open(e) {
  overlay.classList.add('open');
  const src= e.currentTarget.querySelector('img').src;
  overlayImage.src = src;
}

function close() {
  overlay.classList.remove('open');
}

buttons.forEach(button => button.addEventListener('click', open));
overlay.addEventListener('click', close);



 */
$(document).ready(function() {
    $('head').append(`<meta name="description" content="${$('#meta-desc').val()}"></meta>
    <meta name="keywords" content="${$('#meta-tag').val()}"></meta>`);
});

function downloadPage (data) {
    if (!localStorage.getItem("image-download")){
        localStorage.setItem("image-download", JSON.stringify(data));
        //console.log(data);
    } else {
        localStorage.removeItem('image-download');
        localStorage.setItem("image-download", JSON.stringify(data));
    }
    setTimeout(function(){
        location.href = './../image';
    },1000);
}