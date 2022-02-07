
// add to cart fast
$("#sort-index-asc").click(function(){
    $.ajax({
        method: "GET",
        url: "sort-index/asc",
        success: function(response){
            console.log(response);
        },
        error: function(error){
            console.log(error);
        }
    })
});