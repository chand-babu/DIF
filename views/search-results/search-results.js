$(document).ready(function() {
    $("#inside-search").val(location.href.split('/')[location.href.split('/').length - 1].replace("-", " "));
    searchCall('');
    $("#inside-search").keyup(function(event){ 
        //event.preventDefault();
        if(event.keyCode == 13){ 
            //location.reload();
            searchCall($(this).val());
        }
    });
});

function searchCall(val){
    //alert(val);

    var ser = !val ? location.href.split('/')[location.href.split('/').length - 1]: val;
    //alert(ser);
    var query = ser;
    var pageNo = Number($('#count').val()) + 1;
    $.ajax({
        type: "GET",
        url: "./../mvc/action/post/postAction.php",
        contentType: "application/json; charset=utf-8",
        data: { 'page': pageNo, query: query },
        success: function(data)
        {
            if (JSON.parse(data)) {
                JSON.parse(data).forEach((element) => {
                    console.log(element);
                    $('#search-add').append(content (element));       
                });
                $('#count').val(pageNo);
            }
            console.log(data);
        },
        error: function(jqXHR, exception)
        {
            console.log(exception);
        }
    });
}

function content (data) {
    console.log(data);
    var image = Object.hasOwnProperty(data, 'image_sm') ? './..' + data.image_sm :
            './..' + data.featured_image_sm;
    var string = JSON.parse(data.created).created_on.substring(0, 10);
    var d = new Date(string);
    var create = d.getDate() + '/'+ (d.getMonth() + 1) + '/'+ d.getFullYear();
    return `<article class="search-result row">
        <div class="col-xs-12 col-sm-12 col-md-3">
            <a href="./../${ data.name }/${ data.post_url }" title="Lorem ipsum" class="thumbnail">
            <img src="${ image }" alt="Lorem ipsum" width="250" height="140"/></a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-2">
            <ul class="meta-search">
                <li><i class="glyphicon glyphicon-calendar"></i>
                    <span>${ create }</span></li>
            </ul>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-7 excerpet">
            <h3><a href="./../${ data.name.replace(" ", "-") }/${ data.post_url }" title="">${data.title}</a></h3>
            <p>${data.description}</p>						
        </div>
        <span class="clearfix borda"></span>
    </article>`;
}