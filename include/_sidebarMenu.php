<!-- sidebar menu -->
<ul class="nav sidebar-menu">
    <li>
        <a href="reminder.php">
            <span class="fa fa-calendar"></span>
            <span class="sidebar-title">Reminders</span>
        </a>
    </li>
    <li>
        <a class="accordion-toggle" href="#">
            <span class="glyphicons glyphicons-shopping_cart"></span>
            <span class="sidebar-title">Transactions</span>
            <span class="caret"></span>
        </a>
        <ul class="nav sub-nav">
            <? 
                for($i=0;$i<count($row_usermenu_access);$i++){ 
                    if($row_usermenu_access[$i]['isMenuTransactions'] > 0){
            ?>
            <li>
                <a href="<?=$row_usermenu_access[$i]['menuController'];?>.php">
                    <span class="<?=$row_usermenu_access[$i]['glyphicon'];?>"></span> <?=$row_usermenu_access[$i]['menuName'];?> </a>
            </li>
            <? }} ?>
        </ul>
    </li>
    <li>
        <a class="accordion-toggle" href="#">
            <span class="glyphicons glyphicons-fire"></span>
            <span class="sidebar-title">Maintenance</span>
            <span class="caret"></span>
        </a>
        <ul class="nav sub-nav">
            <? 
                for($i=0;$i<count($row_usermenu_access);$i++){ 
                    if($row_usermenu_access[$i]['isMenuMaintenance'] > 0){
            ?>
            <li>
                <a href="<?=$row_usermenu_access[$i]['menuController'];?>.php">
                    <span class="<?=$row_usermenu_access[$i]['glyphicon'];?>"></span> <?=$row_usermenu_access[$i]['menuName'];?> </a>
            </li>
            <? }} ?>
        </ul>
    </li>
    <li>
        <a class="accordion-toggle" href="#">
            <span class="glyphicons glyphicons-calendar"></span>
            <span class="sidebar-title">Reports</span>
            <span class="caret"></span>
        </a>
        <ul class="nav sub-nav">
            <? 
                for($i=0;$i<count($row_usermenu_access);$i++){ 
                    if($row_usermenu_access[$i]['isMenuReport'] > 0){
            ?>
            <li>
                <a href="<?=$row_usermenu_access[$i]['menuController'];?>.php">
                    <span class="<?=$row_usermenu_access[$i]['glyphicon'];?>"></span> <?=$row_usermenu_access[$i]['menuName'];?> </a>
            </li>
            <? }} ?>
        </ul>
    </li>
</ul>
<!-- <ul class="nav sidebar-menu">
    <li class="sidebar-label pt20">Menu</li>
    <li>
        <a href="pages_calendar.html">
            <span class="fa fa-calendar"></span>
            <span class="sidebar-title">Calendar</span>
        </a>
    </li>
    <li>
        <a href="documentation/index.html">
            <span class="glyphicons glyphicons-book_open"></span>
            <span class="sidebar-title">Documentation</span>
        </a>
    </li>
    <li class="active">
        <a href="dashboard.html">
            <span class="glyphicons glyphicons-home"></span>
            <span class="sidebar-title">Dashboard</span>
        </a>
    </li>
    <li class="sidebar-label pt15">Exclusive Tools</li>
    <li>
        <a class="accordion-toggle" href="#">
            <span class="glyphicons glyphicons-fire"></span>
            <span class="sidebar-title">Admin Plugins</span>
            <span class="caret"></span>
        </a>
        <ul class="nav sub-nav">
            <li>
                <a href="admin_plugins-panels.html">
                    <span class="glyphicons glyphicons-book"></span> Admin Panels </a>
            </li>
            <li>
                <a href="admin_plugins-modals.html">
                    <span class="glyphicons glyphicons-show_big_thumbnails"></span> Admin Modals </a>
            </li>
            <li>
                <a href="admin_plugins-dock.html">
                    <span class="glyphicons glyphicons-sampler"></span> Admin Dock </a>
            </li>
        </ul>
    </li>
    <li>
        <a class="accordion-toggle menu-open" href="#">
            <span class="glyphicons glyphicons-cup"></span>
            <span class="sidebar-title">Admin Forms</span>
            <span class="caret"></span>
        </a>
        <ul class="nav sub-nav">
            <li class="active">
                <a href="admin_forms-elements.html">
                    <span class="glyphicons glyphicons-edit"></span> Admin Elements </a>
            </li>
            <li>
                <a href="admin_forms-widgets.html">
                    <span class="glyphicons glyphicons-calendar"></span> Admin Widgets </a>
            </li>
            <li>
                <a href="admin_forms-layouts.html">
                    <span class="glyphicons glyphicons-more_windows"></span> Admin Layouts </a>
            </li>
            <li>
                <a href="admin_forms-wizard.html">
                    <span class="glyphicons glyphicons-magic"></span> Admin Wizard </a>
            </li>                            
            <li>
                <a href="admin_forms-validation.html">
                    <span class="glyphicons glyphicons-check"></span> Admin Validation </a>
            </li>
        </ul>
    </li>

    <li class="sidebar-label pt20">Systems</li>
    <li>
        <a class="accordion-toggle" href="#">
            <span class="glyphicons glyphicons-shopping_cart"></span>
            <span class="sidebar-title">Ecommerce</span>
            <span class="caret"></span>
        </a>
        <ul class="nav sub-nav">
            <li>
                <a href="ecommerce_dashboard.html">
                    <span class="glyphicons glyphicons-shopping_cart"></span> Dashboard <span class="label label-xs bg-primary">New</span></a>
            </li>
            <li>
                <a href="ecommerce_products.html">
                    <span class="glyphicons glyphicons-tags"></span> Products </a>
            </li>
            <li>
                <a href="ecommerce_orders.html">
                    <span class="glyphicons glyphicons-coins"></span> Orders </a>
            </li>
            <li>
                <a href="ecommerce_customers.html">
                    <span class="glyphicons glyphicons-user_add"></span> Customers </a>
            </li>
            <li>
                <a href="ecommerce_settings.html">
                    <span class="glyphicons glyphicons-keys"></span> Store Settings </a>
            </li>
        </ul>
    </li>
    <li>
        <a href="email_templates.html">
            <span class="fa fa-envelope-o"></span>
            <span class="sidebar-title">Email Templates</span>
            <span class="sidebar-title-tray">
                <span class="label label-xs bg-primary">New</span>
            </span>
        </a>
    </li>

    <? //require_once("_sidebarResources.php"); ?>

    <? //require_once("_sidebarBullets.php"); ?>

    <? //require_once("_sidebarProgressBar.php"); ?> -->
</ul>
<div class="sidebar-toggle-mini">
    <a href="#">
        <span class="fa fa-sign-out"></span>
    </a>
</div>