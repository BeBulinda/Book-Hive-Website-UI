<?php

require WPATH . "core/include.php";
$currentPage = "";

//if ( is_menu_set('logout') != "" ) 
//    App::logOut();
if ( is_menu_set('home') != ""){
    $currentPage = WPATH . "modules/home.php";
    set_title("Bookhive | Home");
}

else if ( is_menu_set('home2') != ""){
    $currentPage = WPATH . "modules/home2.php";
    set_title("Bookhive | Home");
}

else if ( is_menu_set('search_all_books') != ""){
    $currentPage = WPATH . "modules/search_all_books.php";
    set_title("Bookhive | Search");
}

else if ( is_menu_set('search_individual_books') != ""){
    $currentPage = WPATH . "modules/search_individual_books.php";
    set_title("Bookhive | Search");
}

else if ( is_menu_set('search_book_levels') != ""){
    $currentPage = WPATH . "modules/search_book_levels.php";
    set_title("Bookhive | Search");
}

else if ( is_menu_set('login') != ""){
    $currentPage = WPATH . "modules/login.php";
    set_title("Bookhive | Login");
}

else if ( is_menu_set('verify_book') != ""){
    $currentPage = WPATH . "modules/verify_book.php";
    set_title("Bookhive | Verify Book");
}

else if ( is_menu_set('register_self_publisher') != ""){
    $currentPage = WPATH . "modules/register_self_publisher.php";
    set_title("Bookhive | Self Publisher Registration");
}

else if ( is_menu_set('register_book_seller') != ""){
    $currentPage = WPATH . "modules/register_book_seller.php";
    set_title("Bookhive | Book Seller Registration");
}

else if ( is_menu_set('register_individual_user') != ""){
    $currentPage = WPATH . "modules/register_individual_user.php";
    set_title("Bookhive | User Registration");
}

else if ( is_menu_set('add_system_administrator') != ""){
    $currentPage = WPATH . "modules/add_system_administrator.php";
    set_title("Bookhive | Administrator Registration");
}

else if ( is_menu_set('faq') != ""){
    $currentPage = WPATH . "modules/faq.php";
    set_title("Bookhive | Frequently Asked Questions");
}

else if ( is_menu_set('tac') != ""){
    $currentPage = WPATH . "modules/tac.php";
    set_title("Bookhive | Terms and Conditions");
}

else if ( is_menu_set('report_piracy') != ""){
    $currentPage = WPATH . "modules/report_piracy.php";
    set_title("Bookhive | Report Piracy");
}

else if ( is_menu_set('checkout') != ""){
    $currentPage = WPATH . "modules/checkout.php";
    set_title("Bookhive | Checkout");
}

else if ( is_menu_set('publisher_books') != ""){
    $currentPage = WPATH . "modules/publisher_books.php";
    set_title("Bookhive | Publisher Books");
}

else if ( is_menu_set('book_details') != ""){
    $currentPage = WPATH . "modules/book_details.php";
    set_title("Bookhive | Book Details");
}

else if ( is_menu_set('contact_us') != ""){
    $currentPage = WPATH . "modules/contact_us.php";
    set_title("Bookhive | Contact Us");
}











//else if ( is_menu_set('ecd_books') != ""){
//    $currentPage = WPATH . "modules/ecd_books.php";
//    set_title("Bookhive | ECD Books");
//}
//
//else if ( is_menu_set('primary_books') != ""){
//    $currentPage = WPATH . "modules/primary_books.php";
//    set_title("Bookhive | Primary Books");
//}
//
//else if ( is_menu_set('secondary_books') != ""){
//    $currentPage = WPATH . "modules/secondary_books.php";
//    set_title("Bookhive | Secondary Books");
//}
//
//else if ( is_menu_set('poetry_books') != ""){
//    $currentPage = WPATH . "modules/poetry_books.php";
//    set_title("Bookhive | Poetry Books");
//}
//
//else if ( is_menu_set('lifestyle_books') != ""){
//    $currentPage = WPATH . "modules/lifestyle_books.php";
//    set_title("Bookhive | Lifestyle Books");
//}
//
//else if ( is_menu_set('ecd_books') != ""){
//    $currentPage = WPATH . "modules/ecd_books.php";
//    set_title("Bookhive | ECD Books");
//}

else if (!empty($_GET)) {
    App::redirectTo("?");
}

else{
    $currentPage = WPATH . "modules/home.php";
    if ( App::isLoggedIn() ) {
		set_title("Bookhive | Home");                
	}        
}

if (App::isAjaxRequest())
    include $currentPage;
else {
    require WPATH . "core/template/layout.php";
}
?>