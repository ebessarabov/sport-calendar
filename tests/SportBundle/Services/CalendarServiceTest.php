<?php

use SportBundle\Services\CalendarService;
use \Doctrine\ORM\EntityRepository;
use \SportBundle\Entity\User;

class CalendarServiceTest extends PHPUnit_Framework_TestCase
{
    public function testGetData()
    {
        $exerciseRepository = $this
            ->getMockBuilder(EntityRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        $user = $this->getMock(User::class);
        $today = new \DateTime('today');

        $exerciseRepository->expects($this->exactly(3))
            ->method('findBy')
            ->withConsecutive(
                [
                    [
                        'user' => $user,
                        'date' => $today
                    ]
                ],
                [
                    [
                        'user' => $user,
                        'date' => $today->modify('1 week ago')
                    ]
                ],
                [
                    [
                        'user' => $user,
                        'date' => $today->modify('2 weeks ago')
                    ]
                ]
            )
            ->will($this->returnValue([]));

        $expectedResult = [
            'today'         => [],
            'one_week_ago'  => [],
            'two_weeks_ago' => []
        ];

        $calendarService = new CalendarService($exerciseRepository);
        $this->assertEquals($expectedResult, $calendarService->getData($user, $today));
    }
}
