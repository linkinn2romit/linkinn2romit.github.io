<html>

<?php
    // head tag
    include_once 'head.php';
?>
<body>

    <div id="header">
        <header class="login-header border-none pl-5 pt-3">
                   
            <div id="buText" class="d-none d-lg-block text-left ml-5 mt-1 pt-5 pl-5">
                <a  href="http://www.bellevue.edu/" target="_blank"><img src="/resources/bu_images/header-bu-text.png" style="max-width: 100% ;"></a>
            </div>
            
        </header>
    </div>

<div class="container" style="min-height: 100vh">
    <div class="row justify-content-center">    
      <div id="genericAlertBox" class="alert alert-danger text-center col-8 col-md-4 my-2" style="display:none" role="alert"><strong>Oops! Looks like you're missing a few things or entered incorrect data..</strong><br/><br/></div>      
    </div>

    <!-- <div class="alert alert-danger" id="messageBox" style="display: none; text-align: center;">            
            <font color="#AB162B"><strong>Oops!</strong> Looks like you're missing a few things or entered incorrect data..</font>
    </div> -->

    <section>
      <div class="row bg-light" style="min-height: 100vh">
        <div class="d-none d-md-block col-md-2"></div>        
        
        <div class="col-md-9 justify-content-md-centre mt-5">
          <div class="h2">My Time Card</div>
          <div class="border border-secondary my-4"></div>

          <form name="operationhelpdesk" method="POST" action="process.php" id="operationhelpdesk" role="form" ENCTYPE="multipart/form-data">
            <div class="form-group">

                  <div class="row">                        
                        <div class="col-sm-4 mt-2">
                          <label for="totalHours" class="mb-2"><b>Total Hours</b></label>
                          <input type="text" class="form-control" id="totalHours" name="totalHours" aria-describedby="Total Hours" placeholder="Total Hours">
                          <!-- <label class="mt-2" for="fName">First</label> -->
                        </div>
                        <div class="col-sm-4 mt-2">
                          <label for="coveredHours" class="mb-2"><b>Covered Hours</b></label>
                          <input type="text" class="form-control" id="coveredHours" name="coveredHours" aria-describedby="Covered Hours" placeholder="Covered Hours">
                          <!-- <label class="mt-2" for="lName">Last</label> -->
                        </div>
                        <div class="col-sm-4 mt-2 mb-4">
                          <label for="remainingHours" class="mb-2"><b>Remaining Hours</b></label>
                          <input type="text" class="form-control" id="remainingHours" name="remainingHours" aria-describedby="Remaining Hours" placeholder="Remaining Hours" readonly>
                          <!-- <label class="mt-2" for="lName">Last</label> -->
                        </div>
                </div>

                <!-- <div class="row">                        
                        <div class="col-sm-4 mt-2">
                          <label for="hrsToMin" class="mb-2"><b>Converting Hrs Into Mins</b></label>
                          <input type="text" class="form-control" id="hrsToMin" name="hrsToMin" aria-describedby="Hours to Min" placeholder="Hours to Min">
                        </div>
                        <div class="col-sm-4 mt-2">
                          <label for="minutes" class="mb-2"><b>Minutes</b></label>
                          <input type="text" class="form-control" id="minutes" name="minutes" aria-describedby="Minutes" placeholder="Minutes" readonly>
                        </div>
                </div> -->

                <div class="row">                        
                        <div class="col-sm-4 mt-2">
                          <label for="clockIn" class="mb-2"><b>Clock In Time</b></label>
                            <div class="row">
                              <div class="col-sm-4 mt-2">
                                <input type="text" class="form-control" id="clockInHrs" name="clockInHrs" aria-describedby="Clock In Hrs" placeholder="Hrs">
                              </div>
                              <div class="col-sm-4 mt-2">
                                <input type="text" class="form-control" id="clockInMins" name="clockInMins" aria-describedby="Clock In Mins" placeholder="Mins">
                              </div>
                            </div>
                        </div>
                        <!-- <div class="col-sm-4 mt-2">
                          <label for="clockOutMinutes" class="mb-2"><b>Clock Out Minutes</b></label>
                          <input type="text" class="form-control" id="clockOutMinutes" name="" aria-describedby="Clock Out Minutes" placeholder="Clock Out Minutes" readonly>
                        </div> -->
                <!-- </div>

                <div class="row">                         -->
                        <div class="col-sm-4 mt-2">
                          <label for="clockIn" class="mb-2"><b>Clock Out Time</b></label>
                            <div class="row">
                              <div class="col-sm-4 mt-2">
                                <input type="text" class="form-control" id="clockOutHrs" name="clockOutHrs" aria-describedby="Clock Out Hours" placeholder="Hrs" readonly>
                              </div>
                              <div class="col-sm-4 mt-2">
                                <input type="text" class="form-control" id="clockOutMins" name="clockOutMins" aria-describedby="Clock Out Mins" placeholder="Mins" readonly>
                              </div>
                            </div>
                        </div>
                </div>
            
                <!-- <div class="row my-2">
                  <div class="col-lg-6 mt-2">
                    <label for="name" class="mb-2"><b>Phone Number</b></label>
                    <div class="row">
                        <div class="col-lg-7">
                          <input type="tel" class="form-control" id="phone" name="phone" value="" maxlength="10" aria-describedby="Phone Number" placeholder="">     
                        </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-12 my-2">
                    <label for="name" class="mb-2"><b>Email</b></label>
                    <div class="row">
                        <div class="col-lg-4">
                          <input type="text" class="form-control" id="email" name="email" aria-describedby="Email" placeholder="Email" >
                        </div>
                    </div>
                  </div>
                </div>


                <div class="row">
                  <div class="text-info font-weight-bold col-lg-12 mt-4">
                    <p> This form is for non-confidential requests only. If your request is confidential in nature, please contact the area in question personally.
                    Do NOT put any confidential information in this form.*</p>
                  </div>                  
                  <div class="col-lg-12">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="agree" name="agree">
                      <label class="form-check-label" for="checkbox">I Understand</label>
                    </div>
                    <div class="row errorMsgAgree"></div>
                  </div>
                </div>

                <div class="row mt-4">
                  <div class="col-lg-6">
                    <label for="firstChoice"><b>Select a Department</b></label>
                      <select type="dropdown" class="form-control" id="firstChoice" name="firstChoice" aria-describedby="Select Choice">
                        <option value=''>Select a Department..</option>
                        <option value='Business Finance'>Business Finance</option>
                        <option value='Student Accounts'>Student Accounts</option>
                        <option value='Human Resources'>Human Resources</option>
                        <option value='Financial Planning & Budgeting'>Financial Planning & Budgeting</option>
                        <option value='Institutional Effectiveness'>Institutional Effectiveness</option>
                        <option value='Business Support'>Business Support</option>
                        <option value='Compliance'>Compliance</option>
                      </select>
                  </div>
                </div>

                <div class="row mt-4">
                  <div class="col-lg-6">
                    <label for="secondChoice"><b>Select a Sub-Department</label>
                      <select type="dropdown" class="form-control" id="secondChoice" name="secondChoice" aria-describedby="Select Choice">
                        <option value="">Select a Sub-Department..</option>
                      </select>
                  </div>
                </div>

                <div class="row mt-4">
                  <div class="col-lg-12">
                    <label for="requestDetail">Request Detail</label>
                    <textarea class="form-control" id="requestDetail" name="requestDetail" rows="4" aria-describedby="requestDetail"></textarea>
                  </div>
                </div>

                <div class="row mt-4">
                  <div class="col-lg-12">
                    <label for="followUp">Would you like a follow-up ?</label><br/>
                      <div class="custom-control custom-radio custom-control-inline mt-2">
                        <input type="radio" id="followUp_yes" name="followUp" class="custom-control-input" value="Yes" aria-describedby="follow up">
                        <label class="custom-control-label" for="followUp_yes">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="followUp_no" name="followUp" class="custom-control-input" value="No" aria-describedby="follow up">
                          <label class="custom-control-label" for="followUp_no">No</label>                          
                      </div>
                      <div class="row errorMsgfollowUp"></div>
                  </div>                  
                </div> -->

                <div class="col-md-12 border border-secondary my-4"></div>
                
              <!-- Submit button goes here -->             
                <!-- <input type="submit" id="submitBtn" name="submitBtn" class="col-lg-4 btn btn-success btn-lg float-right my-4" value="Submit"> -->
                <input id="resetBtn" type="button" name="resetBtn" class="col-lg-2 btn btn-warning btn-lg float-left my-2" value="Start Over">

            </div>
          </form>
        </div>
      </div>
    </section>

</div>

</body>

<footer class="bg-dark text-light pt-4">

<!-- Copyright -->
<div class="footer-copyright text-center py-3">© 2018 Copyright :
  <a href="https://www.bellevue.edu/"> bellevue.edu</a>
</div>

</footer>


</html>