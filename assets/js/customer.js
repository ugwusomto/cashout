$(document).ready(function(){

  // Handle Registration/Login
  $('.cashout_form').submit(handleFormSubmission);

  // select investemt plan
  $(".investment_plan").change(handleInvestmentPlanDisplay);

  //process form for investment
  $(".investment_form").submit(handleInvestmentSubmission);
 
});


/**
 * @desc This function Hanldes Form Submitiion of the customer
 * @param event Object
 * @returns None
 */
function handleFormSubmission(event){
  event.preventDefault();
  const form = $(this);
  const formButton = form.find("button[type='submit']");
  const action = form.attr("action");
  const method = form.attr("method");
  const formType = form.data("form");
  let messageBox = $(".messageBox");
  messageBox.empty();
  let formData = form.serializeArray();
  formData.push({name:formType,value:true})
  
  formButton.attr({disabled:true}).html(formButton.data("process"))
  //ajax Call
  $.ajax({
    method:method,
    data:formData,
    url:action,
    success:function(response){
      response = JSON.parse(response);
      console.log(response)
      formButton.attr({ disabled: false }).html(formButton.data("name"));

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




/**
 * @desc This function Hanldes Investment Submission
 * @param event Object
 * @returns None
 */
function handleInvestmentSubmission(event){
  event.preventDefault();
  const form = $(this);
  const formButton = form.find("button[type='submit']");
  const action = form.attr("action");
  const method = form.attr("method");
  const formType = form.data("form");
  let messageBox = $(".messageBox");
  messageBox.empty();
  let formData = form.serializeArray();
  formData.push({name:formType,value:true})

  if(formData[0]["value"] == ""){

    alert("Please select a plan");
    return;
  }
  
  formButton.attr({disabled:true}).html(formButton.data("process"))


  //ajax Call
  $.ajax({
    method:method,
    data:formData,
    url:action,
    success:function(response){
      response = JSON.parse(response);
      console.log(response)
      formButton.attr({ disabled: false }).html(formButton.data("name"));
       $(".investment_detail").empty();

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




/**
 * @desc This function Hanldes display of investment plan
 * @param event Object
 * @returns None
 */
function handleInvestmentPlanDisplay(event){
  event.preventDefault();
  const selectElement = $(this);
  const plans = selectElement.data("plan");
  const optionSelected = selectElement.find(":selected");
  const plan_id = optionSelected.data("id");
  const selectedPlan = plans[plan_id];
  let messageBox = $(".messageBox");
	messageBox.empty();
  if(selectedPlan != undefined){
     
    let planList = $("<ul>").addClass("list-group");
    for (const key in selectedPlan) {

      let displayText = selectedPlan[key];

      if(key == "min" || key == "max"){
         displayText = "₦"+ displayText.toLocaleString()
      }

            if (key == "commission" || key == "roi") {
							displayText = displayText+"%";
						} 
      planList.append(
				$("<li>")
					.addClass("list-group-item")
					.append($("<b>").text(key.toUpperCase() + " : "))
					.append($("<span>").text(" " + displayText))
			);
		}

    $(".investment_detail").empty().append(planList);

  }else{
    $(".investment_detail").empty();

  }
  console.log(selectedPlan);
}
