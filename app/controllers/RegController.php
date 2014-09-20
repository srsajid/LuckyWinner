<?php

class RegController extends \BaseController {

    public function __construct() {
        $this->beforeFilter("admin");
    }

    public function getTableView() {
        $max = Input::get("max") ? intval(Input::get("max")): 10;
        $offset = Input::get("offset") ? intval(Input::get("offset")) : 0;
        $regs = Registration::take($max)->skip($offset)->orderBy('id', "DESC");
        $total = Registration::count();
        $regs = $regs->get();

        return View::make("reg.tableView", array(
            'regs' => $regs,
            'total' => $total,
            'max' => $max,
            'offset' => $offset,
        ));
    }

    public function getWinner() {
        $start = date("y-m-d", strtotime("-6 day", strtotime("last friday")));
        $end = date("y-m-d", strtotime("last friday"));
        $reg = Registration::whereBetween("date", array($start, $end))->orderByRaw("rand()")->take(1)->get()->first();
        if(!$reg) {
            return array("status" => "error", "message" => "No registration found for last week.");
        }
        return View::make("reg.winner", array("reg" => $reg));

    }
}
