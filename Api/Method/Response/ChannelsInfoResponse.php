<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Api\Method\Response;

use CL\Slack\Model\Channel;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ChannelsInfoResponse extends Response
{
    /**
     * @return Channel|null
     */
    public function getChannel()
    {
        return $this->data['channel'];
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResolver(OptionsResolverInterface $resolver)
    {
        parent::configureResolver($resolver);

        $resolver->setOptional([
            'channel',
        ]);
        $resolver->setAllowedTypes([
            'channel' => ['\CL\Slack\Model\Channel', 'null'],
        ]);
        $resolver->setNormalizers([
            'channel' => function (Options $options, $channel) {
                if (is_array($channel)) {
                    return new Channel($channel);
                }

                return null;
            },
        ]);
    }
}
