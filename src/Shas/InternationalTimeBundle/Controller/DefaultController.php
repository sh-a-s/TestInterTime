<?php

namespace Shas\InternationalTimeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('InternationalTimeBundle:Default:index.html.twig');
    }

    public function getClockDataByAjaxAction()
    {
        $clocks = $this->getParameter('international_clocks');

        $clockData = [];
        foreach ($clocks as $clock) {
            array_push(
                $clockData,
                [
                    'city' => $clock['city'],
                    'time' => $this->getTimeWithOffset($clock['offset'])
                ]
            );
        }

        return new JsonResponse(
            [
                'status'    => true,
                'clockData' => $clockData
            ]
        );

    }

    private function getTimeWithOffset($offset)
    {
        preg_match("/([+|-]??)(\d+):(\d+)/", $offset, $offsetData);

        if (count($offsetData) !== 4) {
            return "--:--:--";
        }

        if ($offsetData[1] == '-') {
            $sign = '-';
        } else {
            $sign = '+';
        }

        date_default_timezone_set("UTC");

        $time = date('H:i:s', strtotime($sign . $offsetData[2] . ' hour' . $sign . $offsetData[3] . ' minutes'));

        return $time;
    }

}
