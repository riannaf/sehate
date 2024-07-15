<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    protected $dashboardModel;

    function __construct()
    {
        $this->dashboardModel = new \App\Models\DashboardModel();
    }

    public function index()
    {
        if (isset($_COOKIE['dashboard'])) {
            $arr_dashboard = json_decode($_COOKIE['dashboard'], true);
        } else {
            $arr_dashboard = [];
        }

        $pencarian_id_dashboard = !isset($_GET['cari'])?'':$_GET['cari']; 

        $data_view = [
            'data' => $arr_dashboard,
            'pencarian_id_dashboard' => $pencarian_id_dashboard
        ];

        return view('dashboard/dashboard', $data_view);

    }

}
