$(document).ready(function(){
    $(function() {
        $("#totalHours, #coveredHours").on("keyup keydown", getRemaingHours);
        function getRemaingHours() {        
            var result= (Number($("#totalHours").val()) - Number($("#coveredHours").val())); 
            $("#remainingHours").val(Number(result).toFixed(2));

            //converting remaining hours to string;            
            var remaining = ($("#remainingHours").val());
            var convRemaining = remaining.toString();
            var resultString = convRemaining.slice(-2);            
            // console.log(res);
            
            //converting remaining hour from string back to number;
            var convertingStrToNum = Number(resultString);
            
            //converting hours into minutes
            var hrsToMins = Number(convertingStrToNum * 60/100).toFixed(2);
            // console.log(hrsToMins);
            
            $("#clockInMins").on("keyup keydown", getClockOutMins);
            function getClockOutMins() {
                var minsClockIn = $("#clockInMins").val();
                if ((Number(hrsToMins) + Number(minsClockIn)) > 60) {
                    var minsClockOut = (Number(hrsToMins) + Number(minsClockIn)) - 60;                    
                } else {
                    var minsClockOut = (Number(hrsToMins) + Number(minsClockIn));
                }
                $("#clockOutMins").val(Number(minsClockOut).toFixed(0));
                // console.log(minsClockOut);

                //Getting clock out hours
                var remainingHrs   = (Number(parseInt($("#remainingHours").val())));
                var hrsClockIn = (Number($("#clockInHrs").val()));
                var totalHrs = remainingHrs + hrsClockIn;
                if ((Number(hrsToMins) + Number(minsClockIn) >= 60)){
                var totalHrs = totalHrs+1;
                // console.log(totalHrs);
                } 
                $("#clockOutHrs").val(Number(totalHrs));
    
                if (Number($("#clockOutHrs").val() >= 12)){
                    var formatHrs = (Number($("#clockOutHrs").val() - 12));
                    $("#clockOutHrs").val(Number(formatHrs));
                } 
                if (($("#clockOutHrs").val() == 0)) {
                    $("#clockOutHrs").val(Number(12));
                }    
            }
        }

        $("#resetBtn").click(function() {
            // swal({
            //     title: "Are you sure?",
            //     text: "You want to start over?",
            //     type: "warning",
            //     showCancelButton: true,
            //     cancelButtonColor: "#AB162B",
            //     confirmButtonColor: "#4E869F",
            //     confirmButtonText: "Yes, delete!",
            //     cancelButtonText: "No, cancel!",
            //     closeOnConfirm: false,
            //     closeOnCancel: false
            //   },
            //   function(isConfirm) {
            //     if (isConfirm) {
                  location.reload();
            //       swal("Deleted!", "Time Card Is Cleared.", "success");
            //     } else {
            //       swal("Canceled", "Your Time Card Is Safe!", "error");
            //     }
            // });
        });  

        // $("#hrsToMin").on("keyup keydown", getRemaingMinutes);
        // function getRemaingMinutes() {
        //     var a = (Number($("#hrsToMin").val()));
        //     var b = a * 60;
        // $("#minutes").val(Number(b).toFixed(2));
        // }
        
        // $("#mins").on("keyup keydown", getClockOutMinutesTime);
        // function getClockOutMinutesTime() {
        //     var c = (Number($("#mins").val()));
        //     var d = (Number($("#minutes").val()));
        //     var e = (c + d) - 60;
        //     if (e <= 0) {
        //         var e = (c+d);
        //     } 
        // $("#clockOutMinutes").val(Number(e).toFixed(2));
        // $("#clockOutMins").val(Number(e).toFixed());

        // };     
    });
});