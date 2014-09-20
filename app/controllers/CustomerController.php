<?php

class CustomerController extends \BaseController {
    public function __construct() {
        $this->beforeFilter("admin");
    }

    public function getTableView() {
        $max = Input::get("max") ? intval(Input::get("max")): 10;
        $offset = Input::get("offset") ? intval(Input::get("offset")) : 0;
        $array = array();
        $query = "";
        $text = "";
        if(Input::get("searchText")) {
            $query = $query."name Like ?";
            $text = trim(Input::get("searchText")) ;
            array_push($array, "%".$text."%");
        }
        $customers = null;
        $total = 0;
        if(count($array) > 0 ) {
            $customers = Customer::whereRaw($query, $array)->take($max)->skip($offset);
            $total = Customer::whereRaw($query, $array)->count();
        } else {
            $customers = Customer::take($max)->skip($offset)->orderBy('id', "DESC");
            $total = Customer::count();
        }
        $customers = $customers->get();
        return View::make("customer.tableView", array(
            'customers' => $customers,
            'total' => $total,
            'max' => $max,
            'offset' => $offset,
            'searchText' => $text
        ));
    }

    public function getExport(){
        $emails = DB::table("customers")->lists("email");
        $output = implode(",", $emails);
        $headers = array(
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="CustomerEmails.csv"',
        );
        return Response::make(rtrim($output, "\n"), 200, $headers);
    }

}
