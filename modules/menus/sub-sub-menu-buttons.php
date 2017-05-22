<?php
if (is_menu_set('?') != "") {
    $action = "search_user";
} else if ((is_menu_set('view_books') != "") OR ( is_menu_set('view_books_notifications') != "")) {
    $request_url = "?add_book";
    $action_holder = "Add Book";
} else if ((is_menu_set('view_book_levels') != "") OR ( is_menu_set('view_book_levels_notifications') != "")) {
    $request_url = "?add_book_level";
    $action_holder = "Add Book Level";
} else if ((is_menu_set('view_book_sellers') != "") OR ( is_menu_set('view_book_sellers_notifications') != "")) {
    $request_url = "?add_book_seller";
    $action_holder = "Add Book Seller";
} else if ((is_menu_set('view_book_types') != "") OR ( is_menu_set('view_book_types_notifications') != "")) {
    $request_url = "?add_book_type";
    $action_holder = "Add Book Type";
} else if ((is_menu_set('view_contacts') != "") OR ( is_menu_set('view_contacts_notifications') != "")) {
    $request_url = "?add_contact";
    $action_holder = "Add Contact";
} else if ((is_menu_set('view_counties') != "") OR ( is_menu_set('view_counties_notifications') != "")) {
    $request_url = "?add_county";
    $action_holder = "Add County";
} else if ((is_menu_set('view_guest_users') != "") OR ( is_menu_set('view_guest_users_notifications') != "")) {
    $request_url = "?add_guest_user";
    $action_holder = "Add Guest User";
} else if ((is_menu_set('view_individual_users') != "") OR ( is_menu_set('view_individual_users_notifications') != "")) {
    $request_url = "?add_individual_user";
    $action_holder = "Add Individual User";
} else if ((is_menu_set('view_locations') != "") OR ( is_menu_set('view_locations_notifications') != "")) {
    $request_url = "?add_location";
    $action_holder = "Add Location";
} else if ((is_menu_set('view_payment_options') != "") OR ( is_menu_set('view_payment_options_notifications') != "")) {
    $request_url = "?add_payment_option";
    $action_holder = "Add Payment Option";
} else if ((is_menu_set('view_piracy_reports') != "") OR ( is_menu_set('view_piracy_reports_notifications') != "")) {
    $request_url = "?add_piracy_report";
    $action_holder = "Add Piracy Report";
} else if ((is_menu_set('view_publishers') != "") OR ( is_menu_set('view_publishers_notifications') != "")) {
    $request_url = "?add_publisher";
    $action_holder = "Add Publisher";
} else if ((is_menu_set('view_roles') != "") OR ( is_menu_set('view_roles_notifications') != "")) {
    $request_url = "?add_role";
    $action_holder = "Add Role";
} else if ((is_menu_set('view_staff') != "") OR ( is_menu_set('view_staff') != "")) {
    $request_url = "?add_staff";
    $action_holder = "Add Staff";
} else if ((is_menu_set('view_statuses') != "") OR ( is_menu_set('view_statuses_notifications') != "")) {
    $request_url = "?add_status";
    $action_holder = "Add Status";
} else if ((is_menu_set('view_sub_counties') != "") OR ( is_menu_set('view_sub_counties_notifications') != "")) {
    $request_url = "?add_sub_county";
    $action_holder = "Add Sub-County";
} else if ((is_menu_set('view_system_administrators') != "") OR ( is_menu_set('view_system_administrators_notifications') != "")) {
    $request_url = "?add_system_administrator";
    $action_holder = "Add System Administrator";
} else if ((is_menu_set('view_system_components') != "") OR ( is_menu_set('view_system_components_notifications') != "")) {
    $request_url = "?add_system_component";
    $action_holder = "Add System Component";
} else if ((is_menu_set('view_system_privileges') != "") OR ( is_menu_set('view_system_privileges_notifications') != "")) {
    $request_url = "?add_system_privileges";
    $action_holder = "Add System Privileges";
} else if ((is_menu_set('view_transactions') != "") OR ( is_menu_set('view_transactions_notifications') != "")) {
    $request_url = "?add_transaction";
    $action_holder = "Add Transaction";
} else if ((is_menu_set('view_transaction_details') != "") OR ( is_menu_set('view_transaction_details_notifications') != "")) {
    $request_url = "?add_transaction";
    $action_holder = "Add Transaction";
} else if (is_menu_set('view_user_privileges') != "") {
    $request_url = "?add_user_privilege";
    $action_holder = "Add User Privilege";
} else if ((is_menu_set('view_user_types') != "") OR ( is_menu_set('view_user_types_notifications') != "")) {
    $request_url = "?add_user_type";
    $action_holder = "Add User Type";
}
?>

<div class="buttons"> <a href="<?php echo $request_url; ?>" class="btn btn-inverse btn-mini"><i class="icon-plus icon-white"></i> <?php echo $action_holder; ?> </a></div>
<?php if (is_menu_set('view_roles_individual') != "") { ?>
    <a href="<?php echo "?view_role_privileges"; ?>" class="btn btn-success sub-sub-menu-buttons">
        <i class="fa fa-plus"></i> 
        <?php echo "View Privileges"; ?>
    </a>
<?php } ?>

