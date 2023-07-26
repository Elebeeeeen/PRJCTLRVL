
<!-- for employee-->
@role('employee')
<li class="nav-item">
    <a href="/employeeCreateForm" class="nav-link {{ Request::is('employeeCreateForm') ? 'active' : '' }}">
        <i class="nav-icon fas fa-file "></i>
        <p >Leave Form</p>
    </a>
</li>

<li class="nav-item">
    <a href="/employeeCreatedForm" class="nav-link {{ Request::is('employeeCreatedForm') ? 'active' : '' }}">
        <i class="nav-icon fas fa-folder-open"></i>
        <p >List of Leave Applications</p>
    </a>
</li>
@endrole

@role('division_chief')

<li class="nav-item">
    <a href="/pendingApplication" class="nav-link {{ Request::is('pendingApplication') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p >Home</p>
    </a>
</li>

<li class="nav-item">
    <a href="/employeeCreateForm" class="nav-link {{ Request::is('employeeCreateForm') ? 'active' : '' }}">
        <i class="nav-icon fas fa-file "></i>
        <p >Leave Form</p>
    </a>
</li>

<li class="nav-item">
    <a href="/divisionCreatedForm" class="nav-link {{ Request::is('divisionCreatedForm') ? 'active' : '' }}">
        <i class="nav-icon fas fa-folder-open"></i>
        <p >Filed Leaves</p>
    </a>
</li>

<li class="nav-item">
    <a href="/approvingEmployeesForm" class="nav-link {{ Request::is('approvingEmployeesForm') ? 'active' : '' }}">
        <i class="nav-icon fas fa-folder-open"></i>
        <p >For Approval</p>
    </a>
</li>

@endrole

<!-- for director -->

@role('director')

<li class="nav-item">
    <a href="/pendingApplication" class="nav-link {{ Request::is('pendingApplication') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p >Home</p>
    </a>
</li>


<li class="nav-item">
    <a href="/approvalApplicationDir" class="nav-link {{ Request::is('approvalApplicationDir') ? 'active' : '' }}">
        <i class="nav-icon fas fa-folder-open"></i>
        <p >For Approval</p>
    </a>
</li>



@endrole


<!-- for hr -->

@role('h_r')

<li class="nav-item">
    <a href="/pendingApplication" class="nav-link {{ Request::is('pendingApplication') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p >Home</p>
    </a>
</li>


<li class="nav-item">
    <a href="/approvalApplicationHR" class="nav-link {{ Request::is('approvalApplicationHR') ? 'active' : '' }}">
        <i class="nav-icon fas fa-folder-open"></i>
        <p >For Approval</p>
    </a>
</li>

<li class="nav-item">
    <a href="/acceptAccounts" class="nav-link {{ Request::is('acceptAccounts') ? 'active' : '' }}">
        <i class="nav-icon fas fa-folder-open"></i>
        <p >Pending Accounts</p>
    </a>
</li>



@endrole

<!-- for head HR -->

@role('head_officer')

<li class="nav-item">
    <a href="/pendingApplication" class="nav-link {{ Request::is('pendingApplication') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>   


<li class="nav-item">
    <a href="/approvalApplicationHead" class="nav-link {{ Request::is('approvalApplicationHead') ? 'active' : '' }}">
        <i class="nav-icon fas fa-folder-open"></i>
        <p >For Approval</p>
    </a>
</li>



@endrole



<style>
    .sidenav a,
    .dropdown-btn {
        padding: 6px 8px 6px 20px;
        text-decoration: none;
        display: block;

        border: none;
        background: none;
        width: 100%;
        text-align: left;
        cursor: pointer;

    }

    p{
        font-size: 15px;
    }

    .dropdown-container {
        display: none;
        background-color: #262620;
        padding-bottom: 8px;
        padding-left: 8px;
    }

    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }

        .sidenav a {
            font-size: 390px;
        }
    }
</style>

<script>
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
</script>