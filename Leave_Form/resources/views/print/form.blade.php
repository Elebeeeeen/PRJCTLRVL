<style>
    .card {
        font-family: Arial, Helvetica, sans-serif;
    }

    /* formation header*/

    .align {
        display: inline-block;
    }

    img {
        width: 100px;
        padding: 0px 10px 0px 40px;
    }

    .textAlign {
        text-align: center;
        padding-left: 19px;
        font-size: 15px;
    }

    /* text size for the header */

    .size {
        font-size: 18px;
    }

    .size2 {
        font-size: 20px;
    }

    /* for table */
    .border {
        width: 100%;
        height: auto;
        border: 1px solid black;
        margin-top: -1px;
    }

    /* first row  */
    .first-row,
    .first-row-input {
        padding: 0px 45px 0px 20px;
        text-align: center;
        font-size: 13px;
    }

    .first-row,
    .second-row {
        font-weight: 0;
    }

    .first-row-input,
    .second-input {
        font-weight: bold;
    }

    .second-row {
        padding: 10px 0px 10px 23px;
        text-align: center;
        font-size: 13px;
    }

    .second-input,
    .fourth-input,
    .fifth-input,
    .fifth-input-inlcusive {
        text-decoration: underline;
    }

    .third-row {
        text-align: center;
        font-size: 13px;
        font-weight: bold;
    }

    .fourth-row {
        width: 50%;
        border: 1px solid black;
        border-bottom: white;
        border-left: white;
        border-top: white;
    }

    .right {
        border-right: white;
    }

    .header-fourth-size {
        font-weight: 0;
        font-size: 13px;
        text-align: left;

    }

    .leave-style {
        font-weight: 0;
        font-size: 12px;
        text-align: justify;
    }

    .incase {
        font-weight: 0;
        font-size: 12px;
        font-style: italic;
        text-align: left;
        padding-top: 25px;
    }

    .add-info {
        font-weight: 0;
        font-size: 13px;
        text-align: left;
    }

    .fifth-input {
        padding-left: 145px;
        font-size: 15px;
    }

    .fifth-input-inlcusive {
        padding-left: 60px;
        font-size: 15px;
    }

    .signature {
        text-align: center;
        padding-top: 15px;
    }

    .mini-table-align {
        padding-left: 10px;
    }

    .mini-table {
        border: 1px solid black;
        font-weight: 0;
        font-size: 12px;
        padding-left: 20px;
        text-align: center;
    }

    .approval {
        padding-top: 55px;
    }

    .eight-row {
        width: 50%;
        padding-left: 30px;
    }

    .eight {
        border-bottom: white;
    }

    .ninth-row {
        border-top: white;
        margin-top: -16px;
        padding-top: 25px;
    }
</style>

<div class="card">

    <div class="row">

        <div class="align">

            <img src="{{ public_path('images/logo.png') }}">

        </div>

        <div class="align textAlign">

            <p> Republic of the Philippines

                <br>

                <strong class="size">Department of finance</strong>

                <br>

                Roxas Boulevard Corner Pablo Ocampo, Sr. Street Manila 1004

                <br>
            </p>
            <strong class="size2">APPLICATION FOR LEAVE</strong>
        </div>

    </div>

    @role('employee')

    <!-- first row -->
    <div class="row">
        <div class="border">

            <table>
                <tr>
                    <th class="first-row">1. OFFICE/DEPARTMENT</th>
                    <th class="first-row">2. NAME</th>
                    <th class="first-row">(First)</th>
                    <th class="first-row">(Last)</th>
                    <th class="first-row">(Middle)</th>
                </tr>
                <tr>
                    <td class="first-row-input">{{$Form['office']}}</td>
                    <td class="first-row-input"></td>
                    <td class="first-row-input">{{$Form['first_name']}}</td>
                    <td class="first-row-input">{{$Form['last_name']}}</td>
                    <td class="first-row-input">{{$Form['middle_initial']}}</td>
                </tr>
            </table>

        </div>
    </div>


    <!-- second row -->

    <div class="row">
        <div class="border">

            <table>
                <tr>
                    <th class="second-row">3. DATE OF FILING: <span class="second-input">{{$Form['date']}}</span></th>
                    <th class="second-row">4. POSITION: <span class="second-input">{{$Form['position']}}</span></th>
                    <th class="second-row">5. SALARY: <span class="second-input">{{$Form['salary']}}</span></th>
                    </th>
                </tr>
            </table>

        </div>
    </div>

    <!-- third row -->
    <div class="row">
        <div class="border">
            <p class="third-row">6. DETAILS OF APPLICATION</p>
        </div>
    </div>

    <!-- fourth row di pa angana ang checkboxes-->
    <div class="row">
        <div class="border">
            <table style="width: 100%">
                <tr>
                    <th class="fourth-row">
                        <p class="header-fourth-size">6.A TYPE OF LEAVE TO BE AVAILED OF</p>

                        @if($Form->type_of_leave == "1")
                        <p class="leave-style"><input type="checkbox" checked>Vacation Leave (Sec. 51, Rule XVI, Omnibus Rules Implementation E.O No. 292)</p>
                        @else
                        <p class="leave-style"><input type="checkbox">Vacation Leave (Sec. 51, Rule XVI, Omnibus Rules Implementation E.O No. 292)</p>
                        @endif

                        @if($Form->type_of_leave == "2")
                        <p class="leave-style"><input type="checkbox" checked> Mandatory/Forced Leave (Sec. 25, Rule XVI, Omnibus Rules Implementation E.O No. 292)</p>
                        @else
                        <p class="leave-style"><input type="checkbox"> Mandatory/Forced Leave (Sec. 25, Rule XVI, Omnibus Rules Implementation E.O No. 292)</p>
                        @endif


                        @if($Form->type_of_leave == "3")
                        <p class="leave-style"><input type="checkbox" checked> Sick Leave (Sec. 43, Rule XVI, Omnibus Rules Implementation E.O No. 292)</p>
                        @else
                        <p class="leave-style"><input type="checkbox"> Sick Leave (Sec. 43, Rule XVI, Omnibus Rules Implementation E.O No. 292)</p>
                        @endif

                        @if($Form->type_of_leave == "4")
                        <p class="leave-style"><input type="checkbox" checked> Maternity Leave (R.A No.11210/IRR issuedby CSC, DOLE, and SSS)</p>
                        @else
                        <p class="leave-style"><input type="checkbox"> Maternity Leave (R.A No.11210/IRR issuedby CSC, DOLE, and SSS)</p>
                        @endif

                        @if($Form->type_of_leave == "5")
                        <p class="leave-style"><input type="checkbox" checked> Paternity Leave (R.A. No.8187/ CSC MC No. 71, S. 1998, as amended)</p>
                        @else
                        <p class="leave-style"><input type="checkbox"> Paternity Leave (R.A. No.8187/ CSC MC No. 71, S. 1998, as amended)</p>
                        @endif

                        @if($Form->type_of_leave == "6")
                        <p class="leave-style"><input type="checkbox" checked> Special Privelage Leave (Sec. 21, Rule XVI, Omnibus Rules Implementation E.O No. 292)</p>
                        @else
                        <p class="leave-style"><input type="checkbox"> Special Privelage Leave (Sec. 21, Rule XVI, Omnibus Rules Implementation E.O No. 292)</p>
                        @endif

                        @if($Form->type_of_leave == "7")
                        <p class="leave-style"><input type="checkbox" checked> Solo Parent Leave (RA No. 8972/CSC MC No. 8, s. 2004)</p>
                        @else
                        <p class="leave-style"><input type="checkbox"> Solo Parent Leave (RA No. 8972/CSC MC No. 8, s. 2004)</p>
                        @endif

                        @if($Form->type_of_leave == "8")
                        <p class="leave-style"><input type="checkbox" checked> 10-Day VAWC Leave (RA No. 9262/CSC MC No.15, s. 2005)</p>
                        @else
                        <p class="leave-style"><input type="checkbox"> 10-Day VAWC Leave (RA No. 9262/CSC MC No.15, s. 2005)</p>
                        @endif

                        @if($Form->type_of_leave == "9")
                        <p class="leave-style"><input type="checkbox" checked> Rehabilitation Privilage (Sec. 55, Rule XVI, Omnibus Rules Implementation E.O No. 292)</p>
                        @else
                        <p class="leave-style"><input type="checkbox"> Rehabilitation Privilage (Sec. 55, Rule XVI, Omnibus Rules Implementation E.O No. 292)</p>
                        @endif

                        @if($Form->type_of_leave == "10")
                        <p class="leave-style"><input type="checkbox" checked> Special Leave Benefits for Women (RA. No. 9710/ CSC MC No. 25, s. 2010)</p>
                        @else
                        <p class="leave-style"><input type="checkbox"> Special Leave Benefits for Women (RA. No. 9710/ CSC MC No. 25, s. 2010)</p>
                        @endif

                        @if($Form->type_of_leave == "11")
                        <p class="leave-style"><input type="checkbox" checked> Special Emergency (Calamity) Leave (CSC MC No. 2, s. 2012, as amended)</p>
                        @else
                        <p class="leave-style"><input type="checkbox"> Special Emergency (Calamity) Leave (CSC MC No. 2, s. 2012, as amended)</p>
                        @endif

                        @if($Form->type_of_leave == "12")
                        <p class="leave-style"><input type="checkbox" checked> Adoption Leave (R.A No. 8552)</p>
                        @else
                        <p class="leave-style"><input type="checkbox"> Adoption Leave (R.A No. 8552)</p>
                        @endif

                        @if($Form->type_of_leave == "13")
                        <p class="leave-style"><input type="checkbox" checked> Option</p>
                        @else
                        <p class="leave-style"><input type="checkbox"> Option</p>
                        @endif

                        <!-- 
                        
                    
                       
                        

                       
                        <p class="leave-style"><input type="checkbox" checked> Adoption Leave (R.A No. 8552)</p>
                        <p class="leave-style"><input type="checkbox" checked> Option</p> -->
                    </th>
                    <th class="right fourth-row">
                        <p class="header-fourth-size">6.B DETAILS OF LEAVE</p>

                        <p class="incase"> In case of Vaccination/Special Privilege Leave:</p>
                        @if($Form->details == "Within the Philippines")
                        <p class="add-info"><input type="checkbox" checked> Within the Philippines (Specify): <span class="fourth-input">{{$Form['specification']}}</span></p>
                        @else
                        <p class="add-info"><input type="checkbox"> Within the Philippines (Specify): <span>__________</span></p>
                        @endif

                        @if($Form->details == "Abroad")
                        <p class="add-info"><input type="checkbox" checked> Abroad (Specify) : <span class="fourth-input">{{$Form['specification']}}</span></p>
                        @else
                        <p class="add-info"><input type="checkbox"> Abroad (Specify) : <span>__________</span></p>
                        @endif




                        <p class="incase"> In case of Sick Leave:</p>
                        @if($Form->details == "In Hospital")
                        <p class="add-info"><input type="checkbox" checked> In Hospital (Specify Illness): <span class="fourth-input">{{$Form['specification']}}</span></p>
                        @else
                        <p class="add-info"><input type="checkbox"> In Hospital (Specify Illness): <span class="fourth-input">__________</span></p>
                        @endif

                        @if($Form->details == "Out Patient")
                        <p class="add-info"><input type="checkbox" checked> Out-Patient (Specify Illness) : <span class="fourth-input">{{$Form['specification']}}</span></p>
                        @else
                        <p class="add-info"><input type="checkbox"> Out-Patient (Specify Illness) : <span class="fourth-input">__________</span></p>
                        @endif

                        <p class="incase"> In case of Special Leave Benefits for Women:</p>
                        @if($Form->details == "In case Leave Benefits for Women")
                        <p class="add-info"><input type="checkbox" checked>(Specify Illness): <span class="fourth-input">{{$Form['specification']}}</span></p>
                        @else
                        <p class="add-info"><input type="checkbox">(Specify Illness): <span class="fourth-input">__________</span></p>
                        @endif




                        <p class="incase"> In case of Study Leave:</p>
                        @if($Form->details == "masters")
                        <p class="add-info"><input type="checkbox" checked> Completion of Master's Degree</p>
                        @else
                        <p class="add-info"><input type="checkbox"> Completion of Master's Degree></p>
                        @endif

                        @if($Form->details == "barBoard")
                        <p class="add-info"><input type="checkbox" checked> BAR/Board Examination</p>
                        @else
                        <p class="add-info"><input type="checkbox"> BAR/Board Examination</p>
                        @endif



                        <p class="incase"> Other Purpose:</p>
                        @if($Form->details == "monetization")
                        <p class="add-info"><input type="checkbox" checked> Monetization of Leave Credits</p>
                        @else
                        <p class="add-info"><input type="checkbox"> Monetization of Leave Credits</p>
                        @endif

                        @if($Form->details == "terminal")
                        <p class="add-info"><input type="checkbox" checked> Terminal Leave</p>
                        @else
                        <p class="add-info"><input type="checkbox"> Terminal Leave</p>
                        @endif

                    </th>
                </tr>

            </table>

        </div>
    </div>

    <!-- fifth row -->

    <div class="row">
        <div class="border">
            <table style="width: 100%">
                <tr>
                    <th class="fourth-row">

                        <p class="header-fourth-size">6.C NUMBER OF WORKING DAYS APPLIED FOR</p>
                        <p class="add-info"><span class="fifth-input">({{$Form['num_working_days']}}) Day/s</span></p>
                        <p class="add-info">INCLUSIVE DATES</p>
                        <p class="add-info"><span class="fifth-input-inlcusive">{{$Form['start_date']}} to {{$Form['end_date']}}</span></p>

                    </th>
                    <th class="right fourth-row">

                        <p class="header-fourth-size">6.D COMMUTATION</p>
                        @if($Form->commutation == "Requested")
                        <p class="add-info"><input type="checkbox" checked> Requested</p>
                        @else
                        <p class="add-info"><input type="checkbox"> Requested</p>
                        @endif

                        @if($Form->commutation == "Not Requested")
                        <p class="add-info"><input type="checkbox" checked> Not Requested (Specify)</p>
                        @else
                        <p class="add-info"><input type="checkbox"> Not Requested (Specify)</p>
                        @endif

                        <p class="add-info signature">______________________________ <br>(Signature of Applicant)</p>

                    </th>
                </tr>

            </table>

        </div>
    </div>


    <!-- sixth row -->
    <div class="row">
        <div class="border">
            <p class="third-row">7. DETAILS OF ACTION APPLICATION</p>
        </div>
    </div>

    <!-- seventh row -->

    <div class="row">
        <div class="border">
            <table style="width: 100%">
                <tr>
                    <th class="fourth-row">

                        <p class="header-fourth-size">7.A CERTIFICATION OF LEAVE CREDTIS</p>
                        <p class="add-info signature">As of ______________________________</p>

                        <table class="mini-table-align">
                            <tr>
                                <th class="mini-table"> </th>
                                <th class="mini-table">Vacation Leave</th>
                                <th class="mini-table">Sick Leave</th>
                            </tr>
                            <tr>
                                <td class="mini-table">Total Earned</td>
                                <td class="mini-table"></td>
                                <td class="mini-table"></td>
                            </tr>
                            <tr>
                                <td class="mini-table">Less this application</td>
                                <td class="mini-table"></td>
                                <td class="mini-table"></td>
                            </tr>
                            <tr>
                                <td class="mini-table">Balance</td>
                                <td class="mini-table"></td>
                                <td class="mini-table"></td>
                            </tr>
                        </table>

                        <p class="add-info signature">______________________________ <br><strong>MAYRIL D. ARCIAGA</strong><br>Administrative Officer III</p>

                    </th>
                    <th class="right fourth-row">
                        <p class="header-fourth-size">7.B RECOMMENDATION</p>
                        <p class="add-info"><input type="checkbox"> For Approval</p>
                        <p class="add-info"><input type="checkbox"> For Disapproval due to</p>

                        <p class="add-info signature approval"><strong>ANGELICA I. SARMIENTO</strong><br>Director IV-CMIO<br>______________________________<br>Authorize Officer</p>


                    </th>
                </tr>

            </table>

        </div>
    </div>



    <!-- eight row -->

    <div class="row">
        <div class="border eight">
            <table style="width: 100%">
                <tr>
                    <th class="eight-row">

                        <p class="header-fourth-size">7.C APPROVED FOR:</p>
                        <p class="add-info">_________________ days with pay</p>
                        <p class="add-info">_________________ days without pay</p>
                        <p class="add-info">_________________ others</p>

                    </th>

                    <th class="right fourth-row">
                        <p class="header-fourth-size">7.D DISAPPROVED DUE TO:</p>
                        <p class="add-info">___________________________________</p>
                        <p class="add-info">___________________________________</p>
                        <p class="add-info">___________________________________</p>
                    </th>
                </tr>

            </table>

        </div>
    </div>

    <!-- ninth row -->
    <div class="row">
        <div class="border ninth-row">
            <p class="add-info signature">______________________________ <br><strong>ALVIN P. DIAZ</strong><br>Director IV-CAO</p>
        </div>
    </div>
    @endrole


    @role('division_chief')
    <!-- first row -->
    <div class="row">
        <div class="border">

            <table>
                <tr>
                    <th class="first-row">1. OFFICE/DEPARTMENT</th>
                    <th class="first-row">2. NAME</th>
                    <th class="first-row">(First)</th>
                    <th class="first-row">(Last)</th>
                    <th class="first-row">(Middle)</th>
                </tr>
                <tr>
                    <td class="first-row-input">{{$Form['office']}}</td>
                    <td class="first-row-input"></td>
                    <td class="first-row-input">{{$Form['first_name']}}</td>
                    <td class="first-row-input">{{$Form['last_name']}}</td>
                    <td class="first-row-input">{{$Form['middle_initial']}}</td>
                </tr>
            </table>

        </div>
    </div>


    <!-- second row -->

    <div class="row">
        <div class="border">

            <table>
                <tr>
                    <th class="second-row">3. DATE OF FILING: <span class="second-input">{{$Form['date']}}</span></th>
                    <th class="second-row">4. POSITION: <span class="second-input">{{$Form['position']}}</span></th>
                    <th class="second-row">5. SALARY: <span class="second-input">{{$Form['salary']}}</span></th>
                    </th>
                </tr>
            </table>

        </div>
    </div>

    <!-- third row -->
    <div class="row">
        <div class="border">
            <p class="third-row">6. DETAILS OF APPLICATION</p>
        </div>
    </div>

    <!-- fourth row di pa angana ang checkboxes-->
    <div class="row">
        <div class="border">
            <table style="width: 100%">
                <tr>
                    <th class="fourth-row">
                        <p class="header-fourth-size">6.A TYPE OF LEAVE TO BE AVAILED OF</p>

                        @if($Form->type_of_leave == "1")
                        <p class="leave-style"><input type="checkbox" checked>Vacation Leave (Sec. 51, Rule XVI, Omnibus Rules Implementation E.O No. 292)</p>
                        @else
                        <p class="leave-style"><input type="checkbox">Vacation Leave (Sec. 51, Rule XVI, Omnibus Rules Implementation E.O No. 292)</p>
                        @endif

                        @if($Form->type_of_leave == "2")
                        <p class="leave-style"><input type="checkbox" checked> Mandatory/Forced Leave (Sec. 25, Rule XVI, Omnibus Rules Implementation E.O No. 292)</p>
                        @else
                        <p class="leave-style"><input type="checkbox"> Mandatory/Forced Leave (Sec. 25, Rule XVI, Omnibus Rules Implementation E.O No. 292)</p>
                        @endif


                        @if($Form->type_of_leave == "3")
                        <p class="leave-style"><input type="checkbox" checked> Sick Leave (Sec. 43, Rule XVI, Omnibus Rules Implementation E.O No. 292)</p>
                        @else
                        <p class="leave-style"><input type="checkbox"> Sick Leave (Sec. 43, Rule XVI, Omnibus Rules Implementation E.O No. 292)</p>
                        @endif

                        @if($Form->type_of_leave == "4")
                        <p class="leave-style"><input type="checkbox" checked> Maternity Leave (R.A No.11210/IRR issuedby CSC, DOLE, and SSS)</p>
                        @else
                        <p class="leave-style"><input type="checkbox"> Maternity Leave (R.A No.11210/IRR issuedby CSC, DOLE, and SSS)</p>
                        @endif

                        @if($Form->type_of_leave == "5")
                        <p class="leave-style"><input type="checkbox" checked> Paternity Leave (R.A. No.8187/ CSC MC No. 71, S. 1998, as amended)</p>
                        @else
                        <p class="leave-style"><input type="checkbox"> Paternity Leave (R.A. No.8187/ CSC MC No. 71, S. 1998, as amended)</p>
                        @endif

                        @if($Form->type_of_leave == "6")
                        <p class="leave-style"><input type="checkbox" checked> Special Privelage Leave (Sec. 21, Rule XVI, Omnibus Rules Implementation E.O No. 292)</p>
                        @else
                        <p class="leave-style"><input type="checkbox"> Special Privelage Leave (Sec. 21, Rule XVI, Omnibus Rules Implementation E.O No. 292)</p>
                        @endif

                        @if($Form->type_of_leave == "7")
                        <p class="leave-style"><input type="checkbox" checked> Solo Parent Leave (RA No. 8972/CSC MC No. 8, s. 2004)</p>
                        @else
                        <p class="leave-style"><input type="checkbox"> Solo Parent Leave (RA No. 8972/CSC MC No. 8, s. 2004)</p>
                        @endif

                        @if($Form->type_of_leave == "8")
                        <p class="leave-style"><input type="checkbox" checked> 10-Day VAWC Leave (RA No. 9262/CSC MC No.15, s. 2005)</p>
                        @else
                        <p class="leave-style"><input type="checkbox"> 10-Day VAWC Leave (RA No. 9262/CSC MC No.15, s. 2005)</p>
                        @endif

                        @if($Form->type_of_leave == "9")
                        <p class="leave-style"><input type="checkbox" checked> Rehabilitation Privilage (Sec. 55, Rule XVI, Omnibus Rules Implementation E.O No. 292)</p>
                        @else
                        <p class="leave-style"><input type="checkbox"> Rehabilitation Privilage (Sec. 55, Rule XVI, Omnibus Rules Implementation E.O No. 292)</p>
                        @endif

                        @if($Form->type_of_leave == "10")
                        <p class="leave-style"><input type="checkbox" checked> Special Leave Benefits for Women (RA. No. 9710/ CSC MC No. 25, s. 2010)</p>
                        @else
                        <p class="leave-style"><input type="checkbox"> Special Leave Benefits for Women (RA. No. 9710/ CSC MC No. 25, s. 2010)</p>
                        @endif

                        @if($Form->type_of_leave == "11")
                        <p class="leave-style"><input type="checkbox" checked> Special Emergency (Calamity) Leave (CSC MC No. 2, s. 2012, as amended)</p>
                        @else
                        <p class="leave-style"><input type="checkbox"> Special Emergency (Calamity) Leave (CSC MC No. 2, s. 2012, as amended)</p>
                        @endif

                        @if($Form->type_of_leave == "12")
                        <p class="leave-style"><input type="checkbox" checked> Adoption Leave (R.A No. 8552)</p>
                        @else
                        <p class="leave-style"><input type="checkbox"> Adoption Leave (R.A No. 8552)</p>
                        @endif

                        @if($Form->type_of_leave == "13")
                        <p class="leave-style"><input type="checkbox" checked> Option</p>
                        @else
                        <p class="leave-style"><input type="checkbox"> Option</p>
                        @endif

                        <!-- 
                        
                    
                       
                        

                       
                        <p class="leave-style"><input type="checkbox" checked> Adoption Leave (R.A No. 8552)</p>
                        <p class="leave-style"><input type="checkbox" checked> Option</p> -->
                    </th>
                    <th class="right fourth-row">
                        <p class="header-fourth-size">6.B DETAILS OF LEAVE</p>

                        <p class="incase"> In case of Vaccination/Special Privilege Leave:</p>
                        @if($Form->details == "Within the Philippines")
                        <p class="add-info"><input type="checkbox" checked> Within the Philippines (Specify): <span class="fourth-input">{{$Form['specification']}}</span></p>
                        @else
                        <p class="add-info"><input type="checkbox"> Within the Philippines (Specify): <span>__________</span></p>
                        @endif

                        @if($Form->details == "Abroad")
                        <p class="add-info"><input type="checkbox" checked> Abroad (Specify) : <span class="fourth-input">{{$Form['specification']}}</span></p>
                        @else
                        <p class="add-info"><input type="checkbox"> Abroad (Specify) : <span>__________</span></p>
                        @endif




                        <p class="incase"> In case of Sick Leave:</p>
                        @if($Form->details == "In Hospital")
                        <p class="add-info"><input type="checkbox" checked> In Hospital (Specify Illness): <span class="fourth-input">{{$Form['specification']}}</span></p>
                        @else
                        <p class="add-info"><input type="checkbox"> In Hospital (Specify Illness): <span class="fourth-input">__________</span></p>
                        @endif

                        @if($Form->details == "Out Patient")
                        <p class="add-info"><input type="checkbox" checked> Out-Patient (Specify Illness) : <span class="fourth-input">{{$Form['specification']}}</span></p>
                        @else
                        <p class="add-info"><input type="checkbox"> Out-Patient (Specify Illness) : <span class="fourth-input">__________</span></p>
                        @endif

                        <p class="incase"> In case of Special Leave Benefits for Women:</p>
                        @if($Form->details == "In case Leave Benefits for Women")
                        <p class="add-info"><input type="checkbox" checked>(Specify Illness): <span class="fourth-input">{{$Form['specification']}}</span></p>
                        @else
                        <p class="add-info"><input type="checkbox">(Specify Illness): <span class="fourth-input">__________</span></p>
                        @endif




                        <p class="incase"> In case of Study Leave:</p>
                        @if($Form->details == "masters")
                        <p class="add-info"><input type="checkbox" checked> Completion of Master's Degree</p>
                        @else
                        <p class="add-info"><input type="checkbox"> Completion of Master's Degree></p>
                        @endif

                        @if($Form->details == "barBoard")
                        <p class="add-info"><input type="checkbox" checked> BAR/Board Examination</p>
                        @else
                        <p class="add-info"><input type="checkbox"> BAR/Board Examination</p>
                        @endif



                        <p class="incase"> Other Purpose:</p>
                        @if($Form->details == "monetization")
                        <p class="add-info"><input type="checkbox" checked> Monetization of Leave Credits</p>
                        @else
                        <p class="add-info"><input type="checkbox"> Monetization of Leave Credits</p>
                        @endif

                        @if($Form->details == "terminal")
                        <p class="add-info"><input type="checkbox" checked> Terminal Leave</p>
                        @else
                        <p class="add-info"><input type="checkbox"> Terminal Leave</p>
                        @endif

                    </th>
                </tr>

            </table>

        </div>
    </div>

    <!-- fifth row -->

    <div class="row">
        <div class="border">
            <table style="width: 100%">
                <tr>
                    <th class="fourth-row">

                        <p class="header-fourth-size">6.C NUMBER OF WORKING DAYS APPLIED FOR</p>
                        <p class="add-info"><span class="fifth-input">({{$Form['num_working_days']}}) Day/s</span></p>
                        <p class="add-info">INCLUSIVE DATES</p>
                        <p class="add-info"><span class="fifth-input-inlcusive">{{$Form['start_date']}} to {{$Form['end_date']}}</span></p>

                    </th>
                    <th class="right fourth-row">

                        <p class="header-fourth-size">6.D COMMUTATION</p>
                        @if($Form->commutation == "Requested")
                        <p class="add-info"><input type="checkbox" checked> Requested</p>
                        @else
                        <p class="add-info"><input type="checkbox"> Requested</p>
                        @endif

                        @if($Form->commutation == "Not Requested")
                        <p class="add-info"><input type="checkbox" checked> Not Requested (Specify)</p>
                        @else
                        <p class="add-info"><input type="checkbox"> Not Requested (Specify)</p>
                        @endif

                        <p class="add-info signature">______________________________ <br>(Signature of Applicant)</p>

                    </th>
                </tr>

            </table>

        </div>
    </div>


    <!-- sixth row -->
    <div class="row">
        <div class="border">
            <p class="third-row">7. DETAILS OF ACTION APPLICATION</p>
        </div>
    </div>

    <!-- seventh row -->

    <div class="row">
        <div class="border">
            <table style="width: 100%">
                <tr>
                    <th class="fourth-row">

                        <p class="header-fourth-size">7.A CERTIFICATION OF LEAVE CREDTIS</p>
                        <p class="add-info signature">As of ______________________________</p>

                        <table class="mini-table-align">
                            <tr>
                                <th class="mini-table"> </th>
                                <th class="mini-table">Vacation Leave</th>
                                <th class="mini-table">Sick Leave</th>
                            </tr>
                            <tr>
                                <td class="mini-table">Total Earned</td>
                                <td class="mini-table"></td>
                                <td class="mini-table"></td>
                            </tr>
                            <tr>
                                <td class="mini-table">Less this application</td>
                                <td class="mini-table"></td>
                                <td class="mini-table"></td>
                            </tr>
                            <tr>
                                <td class="mini-table">Balance</td>
                                <td class="mini-table"></td>
                                <td class="mini-table"></td>
                            </tr>
                        </table>

                        <p class="add-info signature">______________________________ <br><strong>MAYRIL D. ARCIAGA</strong><br>Administrative Officer III</p>

                    </th>
                    <th class="right fourth-row">
                        <p class="header-fourth-size">7.B RECOMMENDATION</p>
                        <p class="add-info"><input type="checkbox"> For Approval</p>
                        <p class="add-info"><input type="checkbox"> For Disapproval due to</p>

                        <p class="add-info signature approval"><strong>ANGELICA I. SARMIENTO</strong><br>Director IV-CMIO<br>______________________________<br>Authorize Officer</p>


                    </th>
                </tr>

            </table>

        </div>
    </div>



    <!-- eight row -->

    <div class="row">
        <div class="border eight">
            <table style="width: 100%">
                <tr>
                    <th class="eight-row">

                        <p class="header-fourth-size">7.C APPROVED FOR:</p>
                        <p class="add-info">_________________ days with pay</p>
                        <p class="add-info">_________________ days without pay</p>
                        <p class="add-info">_________________ others</p>

                    </th>

                    <th class="right fourth-row">
                        <p class="header-fourth-size">7.D DISAPPROVED DUE TO:</p>
                        <p class="add-info">___________________________________</p>
                        <p class="add-info">___________________________________</p>
                        <p class="add-info">___________________________________</p>
                    </th>
                </tr>

            </table>

        </div>
    </div>

    <!-- ninth row -->
    <div class="row">
        <div class="border ninth-row">
            <p class="add-info signature">______________________________ <br><strong>ALVIN P. DIAZ</strong><br>Director IV-CAO</p>
        </div>
    </div>
    @endrole

</div>