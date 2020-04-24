$(document).ready(function() {
    var store = localStorage.getItem('image-download') ?
    JSON.parse(localStorage.getItem('image-download')) : '';
    var uri = location.href.split('/')[location.href.split('/').length - 1];
    //var uriCheck = location.href.split('/')[location.href.split('/').length - 1].replace('-', ' ');
    if (uri == 'image') {
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

    $.ajax({
        type: "GET",
        url: 'https://graph.facebook.com',
        dataType: "json",
        data: {
                id: location.href,
                scrape: true
            },
        success: function(data) {
        console.log(data);
        },
        error: function(x, s, e) {
        console.log('Something went wrong. Handle errors here...', e);
        },
        statusCode: {
        404: function() {
            console.log('data');
        }
        }
    });

    // var twitterShare = document.querySelector('.facebook-share');

    // twitterShare.onclick = function(e) {
    // e.preventDefault();
    // var twitterWindow = window.open('https://twitter.com/share?url=' + document.URL, 'twitter-popup', 'height=350,width=600');
    // if(twitterWindow.focus) { twitterWindow.focus(); }
    //     return false;
    // }  
});

function clickShare() {
    document.getElementsByClassName('fb-share-button').click();
}

