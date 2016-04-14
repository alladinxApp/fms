<? 
    require_once("inc/global.php"); 
    require_once(MODEL_PATH . SESSION_MODEL);
    require_once(MODEL_PATH . USERMENU_MODEL);
    require_once(MODEL_PATH . OPENREMINDERS_MODEL);
    require_once(MODEL_PATH . CONTROLNO_MODEL);
    require_once(MODEL_PATH . EQUIPMENT_MODEL);
    require_once(CONTROLLER_PATH . EQUIPMENT_CONTROLLER);
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

                        <? require_once(VIEW_PATH . V_EQUIPMENTEDIT); ?>

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

            // NUMBERS ONLY w/o DECIMAL
            $('#txtMileageStart,#txtMileageEnd,#txtGasolineAllocationInLiters,#txtInsuranceReminderInDays').priceFormat({
                clearPrefix: true,
                prefix: '',
                centsSeparator: '',
                thousandsSeparator: ',',
                centsLimit: 0
            });

            // NUMBERS w/ DECIMAL AND COMMA
            $('#txtGasolineAllocationInCash,#txtAcquisitionCost,#txtInsuranceCost,#txtRegistrationCost,#txtDepresitionValue').priceFormat({
                clearPrefix: true,
                prefix: '',
                centsSeparator: '.',
                thousandsSeparator: ',',
                centsLimit: 2
            });

            // DATE SHOULD NOT BE GREATER THAN TODAY
            $("#txtInsuranceAppliedDate,#txtPurchaseDate,#txtRegistrationDate").datepicker({
                dateFormat: 'yy-mm-dd',
                maxDate: 0
            });

            // DATE SHOULD NOT BE LESS THAN TODAY
            $("#txtInsuranceExpirationDate,#txtRegistrationExpiryDate").datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: 0
            });

            // SELECTION BOX
            $('#txtAssignee,#txtCustomer,#txtCompany,#txtCategory,#txtMake,#txtLocation,#txtModel,#txtStatus,#txtYear').multiselect();

            $( "#equipment-form" ).validate({
                errorClass: "state-error",
                validClass: "state-success",
                errorElement: "em",

                rules: {
                    txtGasolineAllocationInLiters: {
                        required: true
                    },
                    txtGasolineAllocationInCash: {
                        required: true
                    },
                    txtInsuranceAppliedDate: {
                        required: true
                    },
                    txtInsuranceExpirationDate: {
                        required: true
                    },
                    txtInsuranceReminderInDays: {
                        required: true
                    },
                    txtInsuranceCost: {
                        required: true
                    },
                    txtPurchaseDate: {
                        required: true
                    },
                    txtConductionSticker: {
                        required: true
                    },
                    txtPlateNo: {
                        required: true
                    },
                    txtYear: {
                        required: true
                    },
                    txtEngineNo: {
                        required: true
                    },
                    txtChassisNo: {
                        required: true
                    },
                    txtSerialNo: {
                        required: true
                    },
                    txtAquisitionCost: {
                        required: true
                    },
                    txtRegistrationCost: {
                        required: true
                    },
                    txtDepresitionValue: {
                        required: true
                    }
                },

                messages:{
                    txtColor: {
                        required: 'Please enter vehicle color!'
                    },
                    txtMileageStart: {
                        required: 'Please enter mileage start!'
                    },
                    txtMileageEnd: {
                        required: 'Please enter mileage end!'
                    },
                    txtGasolineAllocationInLiters: {
                        required: 'Please enter gasoline allocation(liters)!'
                    },
                    txtGasolineAllocationInCash: {
                        required: 'Please enter gasoline allocation(cash)!'
                    },
                    txtInsuranceAppliedDate: {
                        required: 'Please enter insurance applied date!'
                    },
                    txtInsuranceExpirationDate: {
                        required: 'Please enter insurance expiration date!'
                    },
                    txtInsuranceReminderInDays: {
                        required: 'Please enter insurance reminder in days!'
                    },
                    txtInsuranceCost: {
                        required: 'Please enter insurance cost!'
                    },
                    txtPurchaseDate: {
                        required: 'Please enter purchase date!'
                    },
                    txtConductionSticker: {
                        required: 'Please enter conduction sticker!'
                    },
                    txtPlateNo: {
                        required: 'Please enter plate no!'
                    },
                    txtYear: {
                        required: 'Please enter year!'
                    },
                    txtEngineNo: {
                        required: 'Please enter engine no!'
                    },
                    txtChassisNo: {
                        required: 'Please enter chassis no!'
                    },
                    txtSerialNo: {
                        required: 'Please enter serial no!'
                    },
                    txtAquisitionCost: {
                        required: 'Please enter aquisition cost!'
                    },
                    txtRegistrationCost: {
                        required: 'Please enter registration cost!'
                    },
                    txtDepresitionValue: {
                        required: 'Please enter depresition value!'
                    }
                }
            });
        });
    </script>

</body>
</html>
