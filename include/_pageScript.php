<style>
    
/* demo page styles */
body {
    min-height: 2300px;
}
.affix-pane.affix {
    top: 80px;
}
.admin-form .panel.heading-border:before,
.admin-form .panel .heading-border:before {
    transition: all 0.7s ease;
}
.custom-nav-animation li {
    display: none;
}
.custom-nav-animation li.animated {
    display: block;
}
</style>

<!-- BEGIN: PAGE SCRIPTS -->

<!-- jQuery -->
<script type="text/javascript" src="assets/jquery/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="assets/jquery/jquery_ui/jquery-ui.min.js"></script>

<!-- Bootstrap -->
<script type="text/javascript" src="assets/js/bootstrap/bootstrap.min.js"></script>

<!-- Theme Javascript -->
<script type="text/javascript" src="assets/js/utility/utility.js"></script>
<script type="text/javascript" src="assets/js/main.js"></script>
<script type="text/javascript" src="assets/js/demo.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {

        "use strict";

        // Init Theme Core    
        Core.init();

        // Init Theme Core    
        Demo.init();
    });
</script>
<!-- END: PAGE SCRIPTS -->