$(document).ready(function() {
    var store = localStorage.getItem('image-download') ?
    JSON.parse(localStorage.getItem('image-download')) : '';
    var uri = location.href.split('/')[location.href.split('/').length - 2];
    var uriCheck = location.href.split('/')[location.href.split('/').length - 1];
    if (uri == 'image' && uriCheck == store.imageTitle) {
        if (store) {
            console.log(store);
            $('#image-title').text(store.imageTitle);
            $('#image-desc').html(store.imageDesc);
            $('#image-view').attr('src','./..' + JSON.parse(store.imageName)[0]);
            $('#image-view').attr('alt', store.imageAlt);
            $('#img-download').attr('href', './..' + JSON.parse(store.imageName)[0]);
        } else {
            location.href = './../404';
        }
    } else {
        //localStorage.removeItem('image-download');
    }
    localStorage.removeItem('image-download');
});