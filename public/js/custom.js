//custom webapp javascript
$(document).ready(function(){
	var url = "/posts";

	popup();

    $('.edit-post').click(function(){
        var post_id = $(this).val();
        $.get(url + '/edit/' + post_id, function (data){
            console.log(data);
            $('#post_id').val(data.id);
            $('#title').val(data.title);
            $('#body').val(data.body);

            if(data.status == 'Active')
                $('#status_active').attr('checked',true);
            else
                $('#status_disable').attr('checked',true);

            $('#btn-save').val("update");
            $('#postModal').modal('show');
            $('#last_update').html('Last Update: ' + data.updated_at);
        }) 
    });

    $('.delete-post').click(function()
    {
        $.ajaxSetup({
            headers: 
            {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        var post_id = $(this).val();
        $.ajax({
            type: "DELETE",
            url: url + '/' + post_id,
            success: function (data) {
                popup();
                $("#post_" + post_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });


    /*$(".delete").on("submit", function()
    {
        return confirm("Do you want to delete this item?");
    });*/


    //------------- AJAX POST SAVE ---------------\\

        $("#btn-save").click(function (e){
            $.ajaxSetup({
                headers: 
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            e.preventDefault(); 

            var status = '';
            if($('#status_active').is(':checked'))
                status = $('#status_active').val();
            else
                status = $('#status_disable').val();

            var formData = {
                title: $('#title').val(),
                body: $('#body').val(),
                status: status,
            }

            var post_id = $('#post_id').val();;
            var type = "put";
            var tmp_url = url;
            tmp_url += '/edit/' + post_id;
            
            $.ajax({
                type: type,
                url: tmp_url,
                data: formData,
                dataType: 'json',
                success: function (data) {

                    $('#title_' + post_id).hide().html(data.title).fadeIn();
                    $('#body_' + post_id).hide().html(data.body).fadeIn();
                    $('#updated_' + post_id).hide().html(data.updated_at).fadeIn();

                    if(data.status == 'Active')
                        $('#post_status_' + post_id).hide().html("<span class='badge badge-pill badge-success' id='status_active_" + post_id + "'>" + data.status + "</span>").fadeIn();
                    else
                        $('#post_status_' + post_id).hide().html("<span class='badge badge-pill badge-warning' id='status_disabled_" + post_id + "'>" + data.status + "</span>").fadeIn();

                    popup();

                    $('#postModal').modal('hide');
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });

    //----- AJAX POST SAVE END -----\\

})

function popup()
{
    $('#popup').delay(500).fadeIn('normal', function() {                               
        $(this).delay(2500).fadeOut();
    });
}