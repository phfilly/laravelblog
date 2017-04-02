//custom webapp javascript
$(document).ready(function()
{
	var url = "/ajax/public/tasks";
	//flash display of messages

	$('#popup').delay(500).fadeIn('normal', function() {
     	$(this).delay(2500).fadeOut();
	});

	/*$(".delete").on("submit", function(){
        return confirm("Do you want to delete this item?");
    });*/
})

function deletePost(id)
{
	 $.ajax({
            method: "POST",
            data: { id:id , _token: token},
            url: url + '/',
            success: function (data) {
                console.log(data);
            },
            error: function (data) {
                console.log('Error:', data);
            }
    });
}