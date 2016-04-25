<?php

namespace SportBundle\Services;

use Doctrine\ORM\EntityRepository;
use SportBundle\Entity\User;

class CalendarService
{
    const CALENDAR_TODAY         = 'today';
    const CALENDAR_ONE_WEEK_AGO  = 'one_week_ago';
    const CALENDAR_TWO_WEEKS_AGO = 'two_weeks_ago';

    /**
     * @var EntityRepository
     */
    protected $exerciseRepository;
    /**
     * CalendarService constructor
     *
     * @param EntityRepository $entityRepository
     */
    public function __construct(EntityRepository $entityRepository)
    {
        $this->exerciseRepository = $entityRepository;
    }

    /**
     * @param User $user
     * @param \DateTime|null $date
     *
     * @return array
     */
    public function getData(User $user, \DateTime $date = null)
    {
        if (null === $date) {
            $date = new \DateTime('today');
        }

        $data = [
            self::CALENDAR_TODAY         => $this->exerciseRepository->findBy([
                'date' => $date, 'user' => $user
            ]),
            self::CALENDAR_ONE_WEEK_AGO  => $this->exerciseRepository->findBy([
                'date' => $date->modify('1 week ago'), 'user' => $user
            ]),
            self::CALENDAR_TWO_WEEKS_AGO => $this->exerciseRepository->findBy([
                'date' => $date->modify('2 weeks ago'), 'user' => $user
            ])
        ];

        return $data;
    }
}
