<? 
    require_once("inc/global.php"); 
    require_once(MODEL_PATH . SESSION_MODEL);
    require_once(MODEL_PATH . USERMENU_MODEL);
    require_once(MODEL_PATH . OPENREMINDERS_MODEL);
    require_once(MODEL_PATH . CONTROLNO_MODEL);
    require_once(MODEL_PATH . PORECEIVING_MODEL);
    require_once(CONTROLLER_PATH . PORECEIVING_CONTROLLER);
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

                        <? require_once(VIEW_PATH . V_PORECEIVINGADD); ?>

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
    <script type="text/javascript" src="assets/js/jquery.price_format.2.0.js"></script>
    <script type="text/javascript" src="assets/js/jquery.blockUI.js"></script>
    <script type="text/javascript">
        function chkWorkOrder(wo){
            var strURL = 'divPOchkWorkOrder.php?wo=' + wo;
            
            $.blockUI({ 
                message: $('#preloader_image'),  
                fadeIn: 1000, 
                onBlock: function() {   
                    $.ajax({
                    url: strURL,
                    type: 'POST',
                    data: null,
                    datatype: 'json',
                    contentType: 'application/json; charset=utf-8',
                        success: function (data) {
                            $("#divTxtWorkOrder").replaceWith(data);
                            $.unblockUI();
                        },  
                                
                        error: function (request, status, err) {
                            alert(status);
                            alert(err);
                        }
                    }); 
                }
            });
        }

        function getTotalCost(){
            var labor = $('#txtLabor').val().replace(/,/g, '');
            var misc = $('#txtMiscellaneous').val().replace(/,/g, '');
            var parts = $('#txtParts').val().replace(/,/g, '');
            var disc = $('#txtDiscount').val().replace(/,/g, '');
			var tax = $('#txtTax').val().replace(/,/g, '');

            if(labor == ""){
                labor = 0;
            }

            if(misc == ""){
                misc = 0;
            }

            if(parts == ""){
                parts = 0;
            }

            if(disc == ""){
                disc = 0;
            }
			
			if(tax == ""){
                tax = 0;
            }
			
            var subtotal = (parseFloat(labor) + parseFloat(misc) + parseFloat(parts)) - parseFloat(disc);
            var totalcost = parseFloat(subtotal) + parseFloat(tax);

            // document.getElementById('txtTotalCost').value = totalcost.toFixed(2);
            $('#txtTotalCost').val(totalcost.toFixed(2));
        }

        jQuery(document).ready(function() {

            // NUMBERS w/ DECIMAL AND COMMA
            $('#txtLabor,#txtMiscellaneous,#txtParts,#txtDiscount,#txtTax,#txtTotalCost').priceFormat({
                clearPrefix: true,
                prefix: '',
                centsSeparator: '.',
                thousandsSeparator: ',',
                centsLimit: 2
            });
			
            $( "#poreceiving-form" ).validate({
                errorClass: "state-error",
                validClass: "state-success",
                errorElement: "em",
				
                rules: {
                    txtWorkOrderNo: {
                            required: true
                    },
                    txtAttachment: {
                        required: true
                    },
                    txtTotalCost: {
                        required: true
                    }
                    // txtEquipment: {
                            // required: true
                    // }
                },

                messages:{
                    txtWorkOrderNo: {
                        required: 'Please enter Work Order Reference No!'
                    },
                    txtAttachment: {
                        required: 'Attachment is required!'
                    },
                    txtTotalCost: {
                        required: 'Total Cost cannot be zero(0) of value! Please enter Labor/Miscellaneous/Parts'
                    }
                    // txtEquipment: {
                            // required: 'Please select Equipment!'
                    // }
                }
            });
        });
    </script>
    <div id="preloader" style="display: none;">Please wait...........
        <div><img src="imgs/loader.gif" id="preloader_image" ></div>
    </div>
</body>
</html>
