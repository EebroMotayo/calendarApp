<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Fullcalendar</title>
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon.ico')}}"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL STYLE -->
    <link href="{{asset('plugins/fullcalendar/fullcalendar.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/fullcalendar/custom-fullcalendar.advance.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/flatpickr/flatpickr.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('plugins/flatpickr/custom-flatpickr.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLE -->
    <style>
        .widget {     margin-bottom: 10px;
            border: none;
            box-shadow: rgb(145 158 171 / 24%) 0px 0px 2px 0px, rgb(145 158 171 / 24%) 0px 16px 32px -4px; }
        .widget-content-area { border-radius: 6px; }
        .daterangepicker.dropdown-menu {
            z-index: 1059;
        }
        .sub-header-container .navbar {
            justify-content: center;
        }
        .footer-wrapper{
            justify-content: center;
        }
        .navbar .theme-brand li.theme-logo img {
            width: 140px;
            margin: 7px 0px;
            height: 35px;
        }
    </style>

</head>
<body>

<!--  BEGIN NAVBAR  -->
<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm">

        <ul class="navbar-item theme-brand flex-row  text-center">
            <li class="nav-item theme-logo">
                <a href="#">
                    <img src="{{asset('assets/img/fungi_logo.png')}}" class="navbar-logo" alt="logo">
                </a>
            </li>

        </ul>



        <ul class="navbar-item flex-row ml-md-auto">

            <li class="nav-item dropdown user-profile-dropdown">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <img src="{{asset('assets/img/g-8.png')}}" alt="avatar">
                </a>
                <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                    <div class="">

                        <div class="dropdown-item">
                            <a class="" href="auth_login.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> Sign Out</a>
                        </div>
                    </div>
                </div>
            </li>

        </ul>
    </header>
</div>
<!--  END NAVBAR  -->

<!--  BEGIN NAVBAR  -->
<div class="sub-header-container">
    <header class="header navbar navbar-expand-sm expand-header">
        <a href="javascript:void(0);" class="sidebarCollapse d-none" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

        <ul class="navbar-nav flex-row">
            <li>
                <div class="page-header">

                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <!--                            <li class="breadcrumb-item"><a href="javascript:void(0);">Apps</a></li>-->
                            <li class="breadcrumb-item active" aria-current="page"><span style="font-size: 16px;color: #000;padding: 8px 0px;">Todo</span></li>
                        </ol>
                    </nav>

                </div>
            </li>
        </ul>
    </header>
</div>
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container sidebar-closed sbar-open" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>


    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing" id="cancel-row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-content widget-content-area">
                            <div class="calendar-upper-section">
                                <div class="row">
                                    <div class="col-md-8 col-12">
                                        <div class="labels">
                                            <p class="label label-primary">Work</p>
                                            <p class="label label-warning">Travel</p>
                                            <p class="label label-success">Personal</p>
                                            <p class="label label-danger">Important</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <form action="javascript:void(0);" class="form-horizontal mt-md-0 mt-3 text-md-right text-center">
                                            <button id="myBtn" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar mr-2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> Add Event</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>

                <!-- The Modal -->
                <div id="addEventsModal" class="modal animated fadeIn">

                    <div class="modal-dialog modal-dialog-centered">

                        <!-- Modal content -->
                        <div class="modal-content">

                            <div class="modal-body">

                                <span class="close">&times;</span>

                                <div class="add-edit-event-box">
                                    <div class="add-edit-event-content">
                                        <h5 class="add-event-title modal-title">Add Events</h5>
                                        <h5 class="edit-event-title modal-title">Edit Events</h5>

                                        <form class="">

                                            <div class="row">

                                                <div class="col-md-12">
                                                    <label for="start-date" class="">Event Title:</label>
                                                    <div class="d-flex event-title">
                                                        <input id="write-e" type="text" placeholder="Enter Title" class="form-control" name="task">
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="form-group start-date">
                                                        <label for="start-date" class="">From:</label>
                                                        <div class="d-flex">
                                                            <input id="start-date" placeholder="Start Date" class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="form-group end-date">
                                                        <label for="end-date" class="">To:</label>
                                                        <div class="d-flex">
                                                            <input id="end-date" placeholder="End Date" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="start-date" class="">Event Description:</label>
                                                    <div class="d-flex event-description">
                                                        <textarea id="taskdescription" placeholder="Enter Description" rows="3" class="form-control" name="taskdescription"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="event-badge">
                                                        <p class="">Badge:</p>

                                                        <div class="d-sm-flex d-block">
                                                            <div class="n-chk">
                                                                <label class="new-control new-radio radio-primary">
                                                                    <input type="radio" class="new-control-input" name="marker" value="bg-primary">
                                                                    <span class="new-control-indicator"></span>Work
                                                                </label>
                                                            </div>

                                                            <div class="n-chk">
                                                                <label class="new-control new-radio radio-warning">
                                                                    <input type="radio" class="new-control-input" name="marker" value="bg-warning">
                                                                    <span class="new-control-indicator"></span>Travel
                                                                </label>
                                                            </div>

                                                            <div class="n-chk">
                                                                <label class="new-control new-radio radio-success">
                                                                    <input type="radio" class="new-control-input" name="marker" value="bg-success">
                                                                    <span class="new-control-indicator"></span>Personal
                                                                </label>
                                                            </div>

                                                            <div class="n-chk">
                                                                <label class="new-control new-radio radio-danger">
                                                                    <input type="radio" class="new-control-input" name="marker" value="bg-danger">
                                                                    <span class="new-control-indicator"></span>Important
                                                                </label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button id="discard" class="btn" data-dismiss="modal">Discard</button>
                                <button id="add-e" class="btn">Add Task</button>
                                <button id="edit-event" class="btn">Save</button>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
        <div class="footer-wrapper">
            <div class="footer-section f-section-1">
                <p class="">Copyright © 2022 <a target="_blank" href="https://ebrimax.riomaxempire.com">Ebrimax</a>, All rights reserved.</p>
            </div>
        </div>
    </div>
    <!--  END CONTENT AREA  -->
</div>
<!-- END MAIN CONTAINER -->

<!-- START GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>

<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{asset('plugins/fullcalendar/moment.min.js')}}"></script>
<script src="{{asset('plugins/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('plugins/fullcalendar/fullcalendar.min.js')}}"></script>
<!-- END PAGE LEVEL SCRIPTS -->

<!--  BEGIN CUSTOM SCRIPTS FILE  -->
<script src="{{asset('plugins/fullcalendar/custom-fullcalendar.advance.js')}}"></script>
<!--  END CUSTOM SCRIPTS FILE  -->
</body>

</html>
