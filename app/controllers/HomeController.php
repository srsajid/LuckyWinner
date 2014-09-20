<?php

class HomeController extends BaseController {

	public function index() {
		return View::make('home.index');
	}

    public function register() {
        $rules = array(
          "name" => "required",
          "email" => "required|email",
          "confirm_email" => "required|email|same:email",
          "phone" => "required"

        );
        $inputs = Input::all();
        $validator = Validator::make($inputs, $rules);
        if($validator->fails()) {
            return Redirect::to("/")->withErrors($validator)->withInput($inputs);
        }
        $customer = Customer::where("email", "=", $inputs["email"])->get()->first();
        if($customer) {
            $today = date("D");
            $start = date("y-m-d", strtotime($today == "Sat" ? "now": "last saturday"));
            $end = date("y-m-d", strtotime($today == "Fri" ? "now" : "next friday"));
            $registration = Registration::where("customer_id", "=", $customer->id)->whereBetween("date", array($start, $end));
            $registration = $registration->get()->first();
            if($registration) {
                return Redirect::to("/")->with("error", "Your are already registered for this week");
            }
        } else {
            $customer = new Customer();
        }

        DB::transaction(function() use ($customer, $inputs) {
            $customer->name = $inputs["name"];
            $customer->email = $inputs["email"];
            $customer->phone = $inputs["phone"];
            $customer->address = $inputs["address"];
            $customer->save();
            $registration = new Registration();
            $registration->date = date("y-m-d", strtotime("now"));
            $registration->customer()->associate($customer);
            $registration->save();
        });

        return Redirect::to("/")->with("success", "You have been successfully registered.");
    }

}
