<style>
    .card {
        font-family: Arial, Helvetica, sans-serif;
    }

    .header {
        width: 100%;
        height: auto;
        table-layout: fixed;
    }

    .header td {
        font-size: 10px;
    }

    .right {
        text-align: right;
    }

    /* formation header*/

    .align {
        display: inline-block;
    }

    img {
        width: 75px;
        padding: 0px 7px 0px 120px;
    }

    .textAlign {
        text-align: center;
        padding-left: 19px;
        font-size: 12px;
    }

    /* text size for the header */

    .size {
        font-size: 13px;
    }

    .size2 {
        font-size: 16px;
    }

    /* for table */
    .first-table,
    .second-table,
    .third-table,
    .fourth-table,
    .fifth-table,
    .sixth-table,
    .seventh-table,
    .eight-table {
        width: 100%;
        height: auto;
        border: 1px solid black;
        table-layout: fixed;
    }

    .row-input {
        text-align: center;
        font-size: 12px;
    }

    td {
        word-wrap: break-word;
        overflow-wrap: break-word;
    }

    .second-table,
    .third-table,
    .fourth-table,
    .fifth-table,
    .sixth-table,
    .seventh-table,
    .eight-table {
        margin-top: -1px;
    }

    .type-leave {
        font-size: 8px;
        border-right: 1px solid black;
    }

    .leave-type {
        font-size: 12px;
    }

    .add-details {
        font-size: 8px;
    }

    .margin {
        margin: 0;
    }

    .details-leave {
        font-size: 12px;
    }

    span {
        text-decoration: underline;
    }

    .add-work-days,
    .signature {
        text-align: center;
        font-size: 12px;
    }

    .add-comms {
        font-size: 10px;
    }

    .mini-table-align {
        padding-left: 35px;
    }

    .mini-table {
        border: 1px solid black;
        font-weight: 0;
        font-size: 12px;
        word-wrap: break-word;
        overflow-wrap: break-word;
        text-align: center;
    }

    .add-approve {
        padding-left: 10px;
        font-size: 10px;
    }

    .head {
        padding-top: 60px;
    }

    .back {
        font-size: 12px;
    }
</style>

<div class="card">

    <table class="header">
        <tbody>
            <tr>

                <td>
                    <p> Civil Service Form No.6
                        <br>
                        Revised 2020
                    </p>
                </td>

                <td class="right">Annex A</td>

            </tr>

        </tbody>
    </table>
    <!-- 
    <div class="header">
        <p> Civil Service Form No.6
            <br>
            Revised 2020
        </p>

    </div> -->

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

    <table class="first-table">
        <tbody>
            <tr>
                <td class="row-input" colspan="2">1. OFFICE/DEPARTMENT</td>
                <td class="row-input" colspan="1">2. NAME</td>
                <td class="row-input" colspan="1">(First)</td>
                <td class="row-input" colspan="1">(Last)</td>
                <td class="row-input" colspan="1">(Middle)</td>
            </tr>
            <tr>
                <td class="row-input" colspan="2">{{$Form['office']}}</td>
                <td class="row-input" colspan="1"></td>
                <td class="row-input" colspan="1">{{$Form['first_name']}}</td>
                <td class="row-input" colspan="1">{{$Form['last_name']}}</td>
                <td class="row-input" colspan="1">{{$Form['middle_initial']}}</td>
            </tr>
        </tbody>
    </table>

    <table class="second-table">
        <tbody>
            <tr>
                <td class="row-input" colspan="2">3. DATE OF FILING: <span>{{$Form['date']}}</span></td>
                <td class="row-input" colspan="2">4. POSITION: <span>{{$Form['position']}}</span></td>
                <td class="row-input" colspan="2">5. SALARY: <span>{{$Form['salary']}}</span></td>
            </tr>
        </tbody>
    </table>

    <table class="third-table">
        <tbody>
            <tr>
                <td class="row-input" colspan="2"><strong>6. DETAILS OF APPLICATION</strong></td>
            </tr>

        </tbody>
    </table>

    <table class="fourth-table">
        <tbody>
            <tr>
                <td class="type-leave" colspan="3">
                    <p class="leave-type">6.A TYPE OF LEAVE TO BE AVAILED OF</p>

                    @if($Form->type_of_leave == "1")
                    <p><input type="checkbox" checked>Vacation Leave (Sec. 51, Rule XVI, Omnibus Rules Implementation E.O No. 292)</p>
                    @else
                    <p><input type="checkbox">Vacation Leave (Sec. 51, Rule XVI, Omnibus Rules Implementation E.O No. 292)</p>
                    @endif

                    @if($Form->type_of_leave == "2")
                    <p><input type="checkbox" checked> Mandatory/Forced Leave (Sec. 25, Rule XVI, Omnibus Rules Implementation E.O No. 292)</p>
                    @else
                    <p><input type="checkbox"> Mandatory/Forced Leave (Sec. 25, Rule XVI, Omnibus Rules Implementation E.O No. 292)</p>
                    @endif

                    @if($Form->type_of_leave == "3")
                    <p><input type="checkbox" checked> Sick Leave (Sec. 43, Rule XVI, Omnibus Rules Implementation E.O No. 292)</p>
                    @else
                    <p><input type="checkbox"> Sick Leave (Sec. 43, Rule XVI, Omnibus Rules Implementation E.O No. 292)</p>
                    @endif

                    @if($Form->type_of_leave == "4")
                    <p><input type="checkbox" checked> Maternity Leave (R.A No.11210/IRR issuedby CSC, DOLE, and SSS)</p>
                    @else
                    <p><input type="checkbox"> Maternity Leave (R.A No.11210/IRR issuedby CSC, DOLE, and SSS)</p>
                    @endif

                    @if($Form->type_of_leave == "5")
                    <p><input type="checkbox" checked> Paternity Leave (R.A. No.8187/ CSC MC No. 71, S. 1998, as amended)</p>
                    @else
                    <p><input type="checkbox"> Paternity Leave (R.A. No.8187/ CSC MC No. 71, S. 1998, as amended)</p>
                    @endif

                    @if($Form->type_of_leave == "6")
                    <p><input type="checkbox" checked> Special Privelage Leave (Sec. 21, Rule XVI, Omnibus Rules Implementation E.O No. 292)</p>
                    @else
                    <p><input type="checkbox"> Special Privelage Leave (Sec. 21, Rule XVI, Omnibus Rules Implementation E.O No. 292)</p>
                    @endif

                    @if($Form->type_of_leave == "7")
                    <p><input type="checkbox" checked> Solo Parent Leave (RA No. 8972/CSC MC No. 8, s. 2004)</p>
                    @else
                    <p><input type="checkbox"> Solo Parent Leave (RA No. 8972/CSC MC No. 8, s. 2004)</p>
                    @endif

                    @if($Form->type_of_leave == "8")
                    <p><input type="checkbox" checked> 10-Day VAWC Leave (RA No. 9262/CSC MC No.15, s. 2005)</p>
                    @else
                    <p><input type="checkbox"> 10-Day VAWC Leave (RA No. 9262/CSC MC No.15, s. 2005)</p>
                    @endif

                    @if($Form->type_of_leave == "9")
                    <p><input type="checkbox" checked> Rehabilitation Privilage (Sec. 55, Rule XVI, Omnibus Rules Implementation E.O No. 292)</p>
                    @else
                    <p><input type="checkbox"> Rehabilitation Privilage (Sec. 55, Rule XVI, Omnibus Rules Implementation E.O No. 292)</p>
                    @endif

                    @if($Form->type_of_leave == "10")
                    <p><input type="checkbox" checked> Special Leave Benefits for Women (RA. No. 9710/ CSC MC No. 25, s. 2010)</p>
                    @else
                    <p><input type="checkbox"> Special Leave Benefits for Women (RA. No. 9710/ CSC MC No. 25, s. 2010)</p>
                    @endif

                    @if($Form->type_of_leave == "11")
                    <p><input type="checkbox" checked> Special Emergency (Calamity) Leave (CSC MC No. 2, s. 2012, as amended)</p>
                    @else
                    <p><input type="checkbox"> Special Emergency (Calamity) Leave (CSC MC No. 2, s. 2012, as amended)</p>
                    @endif

                    @if($Form->type_of_leave == "12")
                    <p><input type="checkbox" checked> Adoption Leave (R.A No. 8552)</p>
                    @else
                    <p><input type="checkbox"> Adoption Leave (R.A No. 8552)</p>
                    @endif

                    @if($Form->type_of_leave == "13")
                    <p><input type="checkbox" checked> Option</p>
                    @else
                    <p><input type="checkbox"> Option</p>
                    @endif

                </td>
                <td class="details-leave" colspan="3">
                    <p class="leave-type">6.B DETAILS OF LEAVE</p>
                    <p><i> In case of Vaccination/Special Privilege Leave:</i></p>

                    @if($Form->details == "Within the Philippines")
                    <p class="add-details"><input type="checkbox" checked> Within the Philippines (Specify): <span class="fourth-input">{{$Form['specification']}}</span></p>
                    @else
                    <p class="add-details"><input type="checkbox"> Within the Philippines (Specify): <span>__________</span></p>
                    @endif

                    @if($Form->details == "Abroad")
                    <p class="add-details"><input type="checkbox" checked> Abroad (Specify) : <span class="fourth-input">{{$Form['specification']}}</span></p>
                    @else
                    <p class="add-details"><input type="checkbox"> Abroad (Specify) : <span>__________</span></p>
                    @endif


                    <p><i> In case of Sick Leave:</i></p>
                    @if($Form->details == "In Hospital")
                    <p class="add-details"><input type="checkbox" checked> In Hospital (Specify Illness): <span class="fourth-input">{{$Form['specification']}}</span></p>
                    @else
                    <p class="add-details"><input type="checkbox"> In Hospital (Specify Illness): <span class="fourth-input">__________</span></p>
                    @endif

                    @if($Form->details == "Out Patient")
                    <p class="add-details"><input type="checkbox" checked> Out-Patient (Specify Illness) : <span class="fourth-input">{{$Form['specification']}}</span></p>
                    @else
                    <p class="add-details"><input type="checkbox"> Out-Patient (Specify Illness) : <span class="fourth-input">__________</span></p>
                    @endif

                    <p><i> In case of Special Leave Benefits for Women:</i></p>
                    @if($Form->details == "In case Leave Benefits for Women")
                    <p class="add-details"><input type="checkbox" checked>(Specify Illness): <span class="fourth-input">{{$Form['specification']}}</span></p>
                    @else
                    <p class="add-details"><input type="checkbox">(Specify Illness): <span class="fourth-input">__________</span></p>
                    @endif


                    <p><i>In case of Study Leave:</i></p>
                    @if($Form->details == "masters")
                    <p class="add-details"><input type="checkbox" checked> Completion of Master's Degree</p>
                    @else
                    <p class="add-details"><input type="checkbox"> Completion of Master's Degree></p>
                    @endif

                    @if($Form->details == "barBoard")
                    <p class="add-details"><input type="checkbox" checked> BAR/Board Examination</p>
                    @else
                    <p class="add-details"><input type="checkbox"> BAR/Board Examination</p>
                    @endif


                    <p><i> Other Purpose:</i></p>
                    @if($Form->details == "monetization")
                    <p class="add-details"><input type="checkbox" checked> Monetization of Leave Credits</p>
                    @else
                    <p class="add-details"><input type="checkbox"> Monetization of Leave Credits</p>
                    @endif

                    @if($Form->details == "terminal")
                    <p class="add-details"><input type="checkbox" checked> Terminal Leave</p>
                    @else
                    <p class="add-details"><input type="checkbox"> Terminal Leave</p>
                    @endif

                </td>
            </tr>
        </tbody>
    </table>

    <table class="fifth-table">
        <tbody>
            <tr>
                <td class="type-leave" colspan="3">
                    <p class="leave-type">6.C NUMBER OF WORKING DAYS APPLIED FOR</p>
                    <p class="add-work-days"><span class="fifth-input">({{$Form['num_working_days']}}) Day/s</span></p>

                    <p class="leave-type">INCLUSIVE DATES</p>
                    <p class="add-work-days"><span class="fifth-input-inlcusive">{{$Form['start_date']}} to {{$Form['end_date']}}</span></p>

                    <br>
                    <br>
                    <br>
                </td>

                <td class="details-leave" colspan="3">
                    <p class="leave-type">6.D COMMUTATION</p>

                    @if($Form->commutation == "Requested")
                    <p class="add-comms"><input type="checkbox" checked> Requested</p>
                    @else
                    <p class="add-comms"><input type="checkbox"> Requested</p>
                    @endif

                    @if($Form->commutation == "Not Requested")
                    <p class="add-comms"><input type="checkbox" checked> Not Requested (Specify)</p>
                    @else
                    <p class="add-comms"><input type="checkbox"> Not Requested (Specify)</p>
                    @endif

                    <p class="signature">______________________________ <br>(Signature of Applicant)</p>

                </td>
            </tr>
        </tbody>
    </table>


    <table class="sixth-table">
        <tbody>
            <tr>
                <td class="row-input" colspan="2"><strong>7. DETAILS OF ACTION ON APPLICATION</strong></td>
            </tr>

        </tbody>
    </table>


    <table class="seventh-table">
        <tbody>
            <tr>
                <td class="type-leave" colspan="3">
                    <p class="leave-type">7.A CERTIFICATION OF LEAVE CREDTIS</p>
                    <p class="add-approve signature">As of ______________________________</p>



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

                    <br>

                    <p class="signature">______________________________ <br><strong>MAYRIL D. ARCIAGA</strong><br>Administrative Officer III</p>



                </td>

                <td class="details-leave" colspan="3">
                    <p class="leave-type">7.B RECOMMENDATION</p>

                    <br>

                    <p class="add-approve"><input type="checkbox"> For Approval</p>
                    <p class="add-approve"><input type="checkbox"> For Disapproval due to</p>

                    <br>
                    <br>

                    <p class="add-approve signature"><strong>ANGELICA I. SARMIENTO</strong><br>Director IV-CMIO<br>______________________________<br>Authorize Officer</p>

                </td>
            </tr>
        </tbody>
    </table>

    <table class="eight-table">
        <tbody>
            <tr>
                <td class="details-leave" colspan="3">
                    <p class="leave-type">7.C APPROVED FOR:</p>
                    <p class="add-approve"> _________________ days with pay</p>
                    <p class="add-approve"> _________________ days without pay</p>
                    <p class="add-approve"> _________________ others</p>

                </td>

                <td class="details-leave" colspan="3">
                    <p class="signature head">______________________________ <strong>ALVIN P. DIAZ</strong><br>Director IV-CAO</p>

                </td>

                <td class="details-leave" colspan="3">
                    <p class="leave-type">7.D DISAPPROVED DUE TO:</p>

                    <p class="add-approve">___________________________________</p>
                    <p class="add-approve">___________________________________</p>
                    <p class="add-approve">___________________________________</p>


                </td>

            </tr>
        </tbody>
    </table>

    <table class="second-page">
        <tbody>
            <tr>
                <td class="back" colspan="3">
                    <p>Application for any type of leave shall be made on this Form and <strong><u>to be
                                accomplished at least in duplicate</u></strong> with documentary requirements, as
                        follows:</p>

                    <p><strong>1. Vacation leave*<br>
                            It shall be filed five (5) days in advance, whenever possible, of the
                            effective date of such leave. Vacation leave within in the Philippines or
                            abroad shall be indicated in the form for purposes of securing travel
                            authority and completing</strong></p>

                    <p><strong>2. Mandatory/Forced leave<br>
                            Annual five-day vacation leave shall be forfeited if not taken during the
                            year. In case the scheduled leave has been cancelled in the exigency of the
                            service by the head of agency, it shall no longer be deducted from the
                            accumulated vacation leave. Availment of one (1) day or more Vacation
                            Leave (VL) shall be considered for complying the mandatory/forced leave
                            subject to the conditions under Section 25, Rule XVI of the Omnibus Rules
                            Implementing E.O. No. 292.</strong></p>


                    <p><strong>3. Sick leave* </strong><br>

                        <li> It shall be filed immediately upon employee&#39;s return from such leave. </li>
                        <li> If filed in advance or exceeding five (5) days, application shall be accompanied by a <u>medical certificate</u>. In case medical consultation was not availed of, an <u>affidavit</u> should be executed by anapplicant. </li>
                    </p>

                    <p><strong>4. Maternity leave* - 105 days </strong><br>

                        <li>Proof of pregnancy e.g. ultrasound, doctor’s certificate on the expected date of delivery</li>
                        <li>Accomplished Notice of Allocation of Maternity Leave Credits (CS Form No. 6a), if needed</li>
                        <li>Seconded female employees shall enjoy maternity leave with full pay in the recipient agency.</li>
                    </p>

                    <p><strong>5. Paternity leave - 7 days<br>
                            <i>Proof of child’s delivery e.g. birth certificate, medical certificate and marriage contract</i></strong></p>

                    <p><strong>6. Special Privilege leave – 3 days<br>
                            <i>It shall be filed/approved for at least one (1) week prior to availment, except on emergency cases. Special privilege leave within the Philippines or abroad shall be indicated in the form for purposes of securing travel authority and completing clearance from money and work accountabilities.</i></strong></p>

                    <p><strong>7. Solo Parent leave – 7 days<br>
                            <i>It shall be filed in advance or whenever possible five (5) days before going on such leave with updated Solo Parent Identification Card.</i></strong></p>

                    <p><strong>8. Study leave* – up to 6 months</strong><br>
                        <li>Shall meet the agency’s internal requirements, if any;</li>
                        <li>Contract between the agency head or authorized representative and the employee concerned.</li>
                    </p>

                    <p><strong>9. VAWC leave – 10 days</strong><br>
                        <li>It shall be filed in advance or immediately upon the woman employee’s return from such leave.</li>
                        <li>It shall be accompanied by any of the following supporting documents:</li>
                    <ol type="a">
                        <li>Barangay Protection Order (BPO) obtained from the barangay;</li>
                        <li>Temporary/Permanent Protection Order (TPO/PPO) obtained from the court;</li>
                        <li>c. If the protection order is not yet issued by the barangay or the court, a certification issued by the Punong Barangay/Kagawad or Prosecutor or the Clerk of Court that the application for the BPO</li>
                    </ol>

                    </p>




                </td>


                <td class="back" colspan="3">
                    <p><strong><i>TPO or PPO has been filed with the said office shall be sufficient to support the application for the ten-day leave; or</i></strong>
                        <br>d. In the absence of the BPO/TPO/PPO or the certification, a police report specifying the details of the occurrence of violence on the victim and a medical certificate may be considered, at the discretion of the immediate supervisor of the woman employee concerned.
                    </p>

                    <p><strong>10. Rehabilitation leave* – up to 6 months </strong><br>

                        <li>Application shall be made within one (1) week from the time of the accident except when a longer period is warranted.</li>
                        <li>Letter request supported by relevant reports such as the police report, if any,</li>
                        <li>Medical certificate on the nature of the injuries, the course of treatment involved, and the need to undergo rest, recuperation, and rehabilitation, as the case may be.</li>
                        <li>Written concurrence of a government physician should be obtained relative to the recommendation for rehabilitation if the attending physician is a private practitioner, particularly on the duration of the period of rehabilitation.</li>
                    </p>

                    <p><strong>11. Special leave benefits for women* – up to 2 months/strong><br>

                            <li>The application may be filed in advance, that is, at least five (5) days prior to the scheduled date of the gynecological surgery that will be undergone by the employee. In case of emergency, the application for special leave shall be filed immediately upon employee’s return but during confinement the agency shall be notified of said surgery.</li>
                            <li>The application shall be accompanied by a medical certificate filled out by the proper medical authorities, e.g. the attending surgeon accompanied by a clinical summary reflecting the gynecological disorder which shall be addressed or was addressed by the said surgery; the histopathological report; the operative technique used for the surgery; the duration of the surgery including the peri- operative period (period of confinement around surgery); as well as the employees estimated period of recuperation for the same.</li>

                    </p>

                    <p><strong>12. Special Emergency (Calamity) leave – up to 5 days </strong><br>

                        <li>The special emergency leave can be applied for a maximum of five
                            <strong><i>(5) straight working days or staggered basis within thirty (30) days from the actual occurrence of the natural calamity/disaster. Said privilege shall be enjoyed once a year, not in every instance of calamity or disaster. </i></strong>
                        </li>
                        <li>The head of office shall take full responsibility for the grant of special emergency leave and verification of the employee’s eligibility to be granted thereof. Said verification shall include: validation of place of residence based on latest available records of the affected employee; verification that the place of residence is covered in the declaration of calamity area by the proper government agency; and such other proofs as may be necessary.</li>
                    </p>

                    <p><strong>13. Monetization of leave credits<br>
                            <i>Application for monetization of fifty percent (50%) or more of the accumulated leave credits shall be accompanied by letter request to the head of the agency stating the valid and justifiable reasons.</i></strong></p>

                    <p><strong>14. Terminal leave*<br>
                            <i>Proof of employee’s resignation or retirement or separation from the service.</i></strong></p>

                    <p><strong>15. Adoption Leave</strong><br>
                        <li>Application for adoption leave shall be filed with an authenticated copy of the Pre-Adoptive Placement Authority issued by the Department of Social Welfare and Development (DSWD).</li>
                    </p>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>


                </td>

            </tr>
        </tbody>
    </table>

    <br>
    
    <table class="back">
        <tbody>
            <tr>
                <td>_______________________________________
                    <br>
                    <br>
                    * For leave of absence for thirty (30) calendar days or more and terminal leave, application shall be accompanied by a <u>clearance from 
                        <br>money, property and work-related accountabilities</u> (pursuant to CSC Memorandum Circular No. 2, s. 1985).
                </td>
            </tr>
        </tbody>
    </table>




</div>