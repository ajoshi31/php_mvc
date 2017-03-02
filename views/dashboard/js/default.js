$(function () {

    $.get('dashboard/xhrGetListings',function (o){

        for(var i = 0; i< o.length; i++){
            $('#listInserts').append(
                '<li class="collection-item">'+
                    '<div>'+o[i].text +
                        '<a href="#!" class="secondary-content del" rel="'+o[i].id+'">'+
                            '<i class="material-icons">send</i>'+
                        '</a>'+
                    '</div>'+
                '</li>'
            );
        }

        $('#listInserts').on('click', '.del', function () {
            var delItem = $(this);
            var id = $(this).attr('rel');
            $.post('dashboard/xhrDeleteListing',{'id' : id},function (o) {
                delItem.parent().parent().remove();
            },'json');
            return false;
        });
    },'json');

    $('#randomInsert').submit(function () {
        var data = $(this).serialize();
        var url = $(this).attr('action');
        $.post(url,data,function (o) {
            $('#listInserts').append(
                '<li class="collection-item">'+
                    '<div>'+o.text +
                        '<a href="#!" class="secondary-content del" rel="'+o.id+'">'+
                            '<i class="material-icons">send</i>'+
                        '</a>'+
                    '</div>'+
                '</li>'
            );
        },'json');
        return false;
    });



});