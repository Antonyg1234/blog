$(document).ready(function() {

    $(document).on('click', ".likes", function (){
        var _this = $(this);
        var id = $(this).data('id');
        var color=$(this).data('color');
        var user_id=$(this).data('user_id');
        var is_like=$(this).data('liked');
        console.log(is_like);
        
        $.ajax({
            url: '/like',
            async: false,
            type: "GET",
            data: {"id":id},
            success: function(data){
                if (!(data)){
                    alert('No data');
                }else{
                   if(is_like==1){
                       alert('red');
                       $('#like_color'+id).css('color', '#333333');
                       $('#likes'+id).text('('+data+')');
                       _this.data('liked', '');
                   }else{
                       alert('green');
                       $('#like_color'+id).css('color', 'green');
                       $('#likes'+id).text('('+data+')');
                       _this.data('liked', '1');
                   }

                }

            }

        });
    });

});