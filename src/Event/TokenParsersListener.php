<?php declare(strict_types=1);
/**
 * This file is part of TwigView.
 *
 ** (c) 2014 Cees-Jan Kiewiet
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WyriHaximus\TwigView\Event;

use Cake\Event\EventListenerInterface;
use WyriHaximus\TwigView\Lib\Twig\TokenParser;

/**
 * Class TokenParsersListener.
 * @package WyriHaximus\TwigView\Event
 */
final class TokenParsersListener implements EventListenerInterface
{
    /**
     * Return implemented events.
     *
     * @return array
     */
    public function implementedEvents(): array
    {
        return [
            ConstructEvent::EVENT => 'construct',
        ];
    }

    /**
     * Event handler.
     *
     * @param ConstructEvent $event Event.
     *
     */
    public function construct(ConstructEvent $event)
    {
        // CakePHP specific tags
        $event->getTwig()->addTokenParser(new TokenParser\Cell());
        $event->getTwig()->addTokenParser(new TokenParser\Element());
    }
}
