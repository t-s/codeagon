<div id="DateCountdown" data-timer=<?php echo $row[4]; ?> style="margin-left: auto; margin-right: auto; width
: 50%;"></div>
<script>
$("#DateCountdown").TimeCircles({
    count_past_zero: false,
    "animation": "smooth",
    "bg_width": 1.2,                                                                                       
    "fg_width": 0.1,
    "circle_bg_color": "#60686F",
    "time": {
        "Days": {
            "text": "Days",
            "color": "#FFCC66",
            "show": false                                                                                  
        },
        "Hours": {
            "text": "Hours",
            "color": "#99CCFF",
            "show": false                                                                                  
        },
        "Minutes": {
            "text": "Minutes",
            "color": "#BBFFBB",
            "show": true                                                                                 
        },
        "Seconds": {
            "text": "Seconds",
            "color": "#FF9999",
            "show": true
        }
    }
}).addListener(function (unit, value, total) 
{ 
    if (total < 1) { 
        $('#code').attr('readonly','readonly'); 
        alert("Time is up!"); 
    }     
});



</script>
