$(document).ready(function(){

  // Handle Registration/Login
  $('.cashout_form').submit(handleFormSubmission);
 
});


/**
 * @desc This function Hanldes Form Submitiion of the customer
 * @param event Object
 * @returns None
 */
function handleFormSubmission(event){
  event.preventDefault();
  const form = $(this);
  const action = form.attr("action");
  const method = form.attr("method");
  const formType = form.data("form");
  let messageBox = $(".messageBox");
  messageBox.empty();
  let formData = form.serializeArray();
  formData.push({name:formType,value:true})
  
  //ajax Call
  $.ajax({
    method:method,
    data:formData,
    url:action,
    success:function(response){
      response = JSON.parse(response);
      console.log(response)
      if(response.errors){
        for (const key in response.errors) {
          messageBox.append($("<p>").text(response.errors[key]).addClass("text-light")) ;
        }
        messageBox
					.removeClass("alert alert-success")
					.addClass("alert alert-danger");
      }else if(response.success){
        messageBox
					.append(
						$("<p>")
							.text(response.success)
							.addClass("text-light")
					)
					.removeClass("alert alert-danger")
					.addClass("alert alert-success");
   
          // redirect to a url if it exists
          if(response.url){
              setTimeout(() => {
             location.href = response.url;
          }, 2000);
          }


      }
    }
  })

}
