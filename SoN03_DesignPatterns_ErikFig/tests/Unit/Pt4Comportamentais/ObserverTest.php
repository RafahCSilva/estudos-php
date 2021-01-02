<?php
/** @noinspection StaticInvocationViaThisInspection */

namespace Tests\RCS\DesignPatterns\Unit\Pt4Comportamentais;

use PHPUnit\Framework\TestCase;
use RCS\DesignPatterns\Pt4Comportamentais\Observer\User;
use RCS\DesignPatterns\Pt4Comportamentais\Observer\UserObserver;

class ObserverTest extends TestCase
{
    public function testObserver(): void
    {
        $observer = new UserObserver();

        $user1 = new User();
        $user1->attach($observer);
        $user1->setEmail('foo@bar.com'); // 1
        $this->assertEquals('foo@bar.com', $observer->getChangedEmails()[0] ?? 'fail');

        $user2 = new User();
        $user2->attach($observer);
        $user2->setEmail('foo2@bar.com'); // 2
        $this->assertEquals('foo2@bar.com', $observer->getChangedEmails()[1] ?? 'fail');

        $user2->setEmail('foo3@bar.com'); // 3
        $user2->setEmail('foo4@bar.com'); // 4
        $user2->setEmail('foo5@bar.com'); // 5
        $user2->detach($observer);
        $user2->setEmail('foo6@bar.com'); // 6 - mas nao conta pq ja deu detach
        $this->assertCount(5, $observer->getChangedEmails());
        $this->assertEquals('foo5@bar.com', $observer->getChangedEmails()[4] ?? 'fail');

        $user3 = new User();
        $user3->attach($observer);
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Duplicated value foo@bar.com');
        $user3->setEmail('foo@bar.com');
    }
}
