$(document).ready(function(){
    $('.button').change(function(){
         $.ajax({
               type: "GET",
               url: "output.php",
               data: "query="+document.form.textarea.value,
               success: function(msg){
                document.getElementById("Div_Where_you_want_the_response").innerHTML = msg                         }
             })
    });
});