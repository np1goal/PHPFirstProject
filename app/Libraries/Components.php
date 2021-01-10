<?php namespace App\Libraries;

class Components {
    public function createCard($params) {
        return view('components/dashboard_card', $params);
    }
}
