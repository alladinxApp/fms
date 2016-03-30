<? 
    require_once("inc/global.php"); 
    require_once(MODEL_PATH . SESSION_MODEL);
    require_once(MODEL_PATH . USERMENU_MODEL);
    require_once(MODEL_PATH . OPENREMINDERS_MODEL);
    require_once(MODEL_PATH . ASSIGNEE_MODEL);
    require_once(CONTROLLER_PATH . ASSIGNEE_CONTROLLER);
    require_once(MODEL_PATH . NOTIFICATION_MODEL);
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>FMS - Fleet Management System</title>
    <meta name="keywords" content="Fleet Management System" />
    <meta name="description" content="FMS - Fleet Management System">
    <meta name="author" content="FMS">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <? require_once(INCLUDE_PATH . "_font.php"); ?>
    <? require_once(INCLUDE_PATH . "_theme_css.php"); ?>
    <? require_once(INCLUDE_PATH . "_adminform_css.php"); ?>
    <? require_once(INCLUDE_PATH . "_favicon.php"); ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <html dir="ltr" lang="en-US" class="no-js ie8">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
</head>

<body class="admin-elements-page" data-spy="scroll" data-target="#nav-spy" data-offset="300">

    <? require_once(INCLUDE_PATH . "_theme.php"); ?>

    <!-- Start: Main -->
    <div id="main">

        <? require_once(INCLUDE_PATH . "_header.php"); ?>

        <? require_once(INCLUDE_PATH . "_sidebar.php"); ?>

        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">

            <? //require_once(INCLUDE_PATH . "_topbarDropdown.php"); ?>

            <? //require_once(INCLUDE_PATH . "_topbar.php"); ?>

            <!-- Begin: Content -->
            <section id="content" class="table-layout animated fadeIn">

                <!-- begin: .tray-center -->
                <div class="tray tray-center ph30 va-t posr animated-delay animated-long" data-animate='["<?=$data_animate_time;?>","<?=$data_animate_type;?>"]'>
                    <div class="mw1100 center-block">

                        <? require_once(VIEW_PATH . V_ASSIGNEEEDIT); ?>

                    </div>
                </div>
                <!-- end: .tray-center -->

            </section>
            <!-- End: Content -->

        </section>

        <? require_once(INCLUDE_PATH . "_sidebarRight.php"); ?>

    </div>
    <!-- End: Main -->

    <? require_once(INCLUDE_PATH . "_pageScript.php");?>
    <script type="text/javascript" src="assets/admin-tools/admin-forms/js/jquery.validate.min.js"></script>
    <!-- FileUpload JS -->
    <script type="text/javascript" src="vendor/plugins/fileupload/fileupload.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/holder.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.price_format.2.0.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            // grant file-upload preview onclick functionality
            $('.fileupload-preview').on('click', function() {
                $('.btn-file > input').click();
            });

            // NUMBERS ONLY
            $('#txtAge,#txtContactNo1,#txtContactNo2').priceFormat({
                clearPrefix: true,
                prefix: '',
                centsSeparator: '',
                thousandsSeparator: '',
                centsLimit: 0
            });

            // $("#txtLicenseExpirationDate").datepicker({
            //     prevText: '<i class="fa fa-chevron-left"></i>',
            //     nextText: '<i class="fa fa-chevron-right"></i>',
            //     showButtonPanel: false,
            //     dateFormat: 'yy-mm-dd',
            //     minDate: 0
            // });

            $("#txtLicenseRegistrationDate").datepicker({
                dateFormat: 'yy-mm-dd',
                onSelect: function(selected) {
                  $("#txtLicenseExpirationDate").datepicker("option","minDate", selected)
                }
            });
            $("#txtLicenseExpirationDate").datepicker({
                dateFormat: 'yy-mm-dd',
                onSelect: function(selected) {
                   $("#txtLicenseRegistrationDate").datepicker("option","maxDate", selected)
                }
            });

            $('#txtCompany,#txtLocation,#txtGender,#txtStatus').multiselect();

            $( "#assignee-form" ).validate({
                errorClass: "state-error",
                validClass: "state-success",
                errorElement: "em",

                rules: {
                    txtFName: {
                        required: true
                    },
                    txtLName: {
                        required: true
                    },
                    txtAge: {
                        required: true,
                        min: 18
                    },
                    txtContactNo1: {
                        required: true
                    },
                    // txtAddress: {
                    //     required: true
                    // },
                    // txtCostCenter: {
                    //     required: true
                    // },
                    // txtImmediateHead: {
                    //     required: true
                    // },
                    // txtImmediateEmailAddress: {
                    //     required: true,
                    //     email: true
                    // },
                    txtLicenseNo: {
                        required: true
                    },
                    txtLicenseRegistrationDate: {
                        required: true
                    },
                    txtLicenseNoExpirationDate: {
                        required: true
                    },
                    txtLicenseAddress: {
                        required: true
                    }
                },

                messages:{
                    txtFName: {
                        required: 'Please enter assignee first name!'
                    },
                    txtLName: {
                        required: 'Please enter assignee last name!'
                    },
                    txtAge: {
                        required: 'Please enter assignee age!',
                        min: 'Minimum age required is 18! Please enter more that the minimum age.'
                    },
                    txtContactNo1: {
                        required: 'Please enter assignee contact no!'
                    },
                    // txtAddress: {
                    //     required: 'Please enter assignee address!'
                    // },
                    // txtCostCenter: {
                    //     required: 'Please enter costcenter!'
                    // },
                    // txtImmediateHead: {
                    //     required: 'Please enter immediate head!'
                    // },
                    // txtImmediateEmailAddress: {
                    //     required: 'Please enter immediate head email address!',
                    //     email: 'Please enter a valid email address!'
                    // },
                    txtLicenseNo: {
                        required: 'Please enter license no!'
                    },
                    txtLicenseRegistrationDate: {
                        required: 'Please enter license registration date!'
                    },
                    txtLicenseNoExpirationDate: {
                        required: 'Please enter license expiration date!'
                    },
                    txtLicenseAddress: {
                        required: 'Please enter license address!'
                    }
                }
            });
        });
    </script>

</body>
</html>
