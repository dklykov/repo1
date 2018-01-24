$(document).ready(function(){
	 $('#content').fadeIn(500);
    $("#GoalRealized").click(function(){
    if ($("#GoalRealized").attr('checked')=="checked")
    	{
    		$("#GoalAchievedMonth").attr('disabled',null);
    		$("#GoalAchievedDay").attr('disabled',null);
    		$("#GoalAchievedYear").attr('disabled',null);
    		$("#GoalAchievedHour").attr('disabled',null);
    		$("#GoalAchievedMin").attr('disabled',null);
    		$("#GoalAchievedMeridian").attr('disabled',null);
    	}
    else
    	{
    		$("#GoalAchievedMonth").attr('disabled',"disabled");
    		$("#GoalAchievedDay").attr('disabled',"disabled");
    		$("#GoalAchievedYear").attr('disabled',"disabled");
    		$("#GoalAchievedHour").attr('disabled',"disabled");
    		$("#GoalAchievedMin").attr('disabled',"disabled");
    		$("#GoalAchievedMeridian").attr('disabled',"disabled");
    	}
    });

});
