<?php

namespace SportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class CalendarController extends Controller
{
    /**
     * @Route("/exercises", name="exercises")
     * @Template
     *
     * @return array
     */
    public function exercisesAction()
    {
        return ['exercises' => $this->get('calendar_service')->getData($this->getUser())];
    }
}
