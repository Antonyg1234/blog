$(document).ready(function() {

    $(document).on('click', ".likes", function (){
        var _this = $(this);
        var id = $(this).data('id');
        var color=$(this).data('color');
        var user_id=$(this).data('user_id');
        var is_like=$(this).data('liked');
        var is_login=$(this).data('login');
        //console.log(user_id);
        if(is_login==1) {
            $.ajax({
                url: '/like',
                async: false,
                type: "GET",
                data: {"id": id},
                success: function (data) {
                    if (!(data)) {
                        alert('No data');
                    } else {
                            if (is_like == 1) {
                                //alert('red');
                                $('#like_color' + id).css('color', '#333333');
                                $('#likes' + id).text('(' + data + ')');
                                _this.data('liked', '');
                            } else {
                                // alert('green');
                                $('#like_color' + id).css('color', 'green');
                                $('#likes' + id).text('(' + data + ')');
                                _this.data('liked', '1');
                            }

                    }

                }

            });
        }else {
            window.location.href = 'login';
        }
    });

});


function KeyPress() {
    $("#title").bind('input', function (){
        var slug = $(this).val();

            $.ajax({
                url: '/slug',
                async: false,
                type: "GET",
                data: {"slug": slug},
                success: function (data) {
                    if (!(data)) {
                       // alert('No data');
                    } else {

                        $("#slug").val(data);
                    }

                }

            });
    });
}


// function KeyPress()
// {
//     $("#title").bind('input', function () {
//         var stt = $(this).val();
//         var sll = stt.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');
//         $("#slug").val(sll);
//     });
// }