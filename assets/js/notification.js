$(document).ready(function() 
{
   $.ajax({
    url:application_url+'Employee/notificationAlert',
    method: 'post',   
    data:constructed_notification,
    cache:false,
    success: function (data)
    {
        var obj = JSON.parse(data);      
        if(obj!='')
        {
          $(".notification").html(obj.common_message);   
          $('.employeenotification').html(obj.notifycount);
        }       
    }  
    });
    
    $("#project_change").on('change',function(){
        
        var url_project=$("#project_change").val();
        window.location.href = application_url+url_project;
        
    });
    
});