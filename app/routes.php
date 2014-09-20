<?php
Route::get("/", "HomeController@index");
Route::post("/register/", "HomeController@register");
Route::get("/login", function(){
    return View::make("admin.login", array('message' => Session::get("flash_error")));
})->before("guest");
Route::post("login", "AdminController@login");
Route::get("logout", "AdminController@logout");
Route::get("/admin", array('as' => 'admin', 'uses' => "AdminController@admin"))->before("auth");

Route::any("/test", function() {
    $table = Customer::all();

    foreach ($table as $row) {
        $output=  implode(",",$row->toArray());
    }
    $headers = array(
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="ExportFileName.csv"',
    );

    return Response::make(rtrim($output, "\n"), 200, $headers);
});
Route::get("/account/change-pass", "AdminController@changePass")->before("auth");
Route::post("/account/save-pass", "AdminController@savePass")->before("auth");

Route::controller("user", "UserController");
Route::controller("reg", "RegController");
Route::controller("customer", "CustomerController");