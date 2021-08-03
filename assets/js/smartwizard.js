$(window).on('load', function(){
    $('#stepwizard').smartWizard("reset");
});

var btnFinish = $('<button></button>').text('Save')
                            .addClass('btn sw-btn-group-extra d-none')
                            .attr('value','submit')
                            .on('click', function(){      
                              onFinishCallback()                  
                            });

var btnCancel = $('<button></button>').text('Cancel')
                            .addClass('btn btn-danger')
                            .on('click', function(){ 
                                $('#stepwizard').smartWizard("reset");
                                $('.sw-btn-group-extra').addClass('d-none');                        
                            });

var wizard = $(document).ready(function(){
  // SmartWizard initialize
  $('#stepwizard').smartWizard(
    {
      anchorSettings: {
        anchorClickable: false, // Enable/Disable anchor navigation
        enableAllAnchors: false, // Activates all anchors clickable all times
        markDoneStep: true, // Add done state on navigation
        markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
        removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
        enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
      },
      theme : 'arrows',
      transitionEffect: 'fade',
      transitionSpeed: '400',
      toolbarSettings: {
        toolbarPosition: 'bottom', 
        toolbarButtonPosition: 'right',
        showNextButton: true,
        showPreviousButton: true, 
        toolbarExtraButtons: [
            btnFinish,
            btnCancel
          ]
      } 
    },
  );
});

$(wizard).on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
    if(stepDirection == "3") //here is the final step: Note: 0,1,2
    {
      $('.sw-btn-group-extra').removeClass('d-none');
    }
    else
    {
      $('.sw-btn-group-extra').addClass('d-none');
    }
});

function onFinishCallback(){
 $.ajax({
   type:'POST',
   url: 'php/savedata.php',
   data: $('#inputdata').serialize(),
   cache: false,
   success: function(){
        window.setTimeout(function(){

        // Move to a new location or you can do something else
        window.location.href = "../index.php?page=input-data#step-1";

    }, 5000);
   }

 });
}