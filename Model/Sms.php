<?php

/**
 * This file is a part of the Yoqut package.
 *
 * (c) Sukhrob Khakimov <sukhrob.khakimov@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that is distributed with this source code.
 */

namespace Yoqut\Component\Sms\Model;

/**
 * The default SMS implementation
 *
 * @author Sukhrob Khakimov <sukhrob.khakimov@gmail.com>
 */
class Sms implements SmsInterface
{
    /**
     * The SMS is sent to an operator
     *
     * @var integer
     */
    const STATE_SENT = 0;

    /**
     * The SMS is accepted by an operator
     *
     * @var integer
     */
    const STATE_ACCEPTED = 1;

    /**
     * The SMS is rejected by an operator
     *
     * @var integer
     */
    const STATE_REJECTED = 2;

    /**
     * The SMS is delivered to a recipient
     *
     * @var integer
     */
    const STATE_DELIVERED = 3;

    /**
     * The SMS is not delivered to a recipient
     *
     * @var integer
     */
    const STATE_FAILED = 4;

    /**
     * The unique id of an SMS
     *
     * @var mixed
     */
    protected $id;

    /**
     * The sender of an SMS
     *
     * @var string
     */
    protected $sender;

    /**
     * The recipient of an SMS
     *
     * @var string
     */
    protected $recipient;

    /**
     * The message of an SMS
     *
     * @var string
     */
    protected $message;

    /**
     * The state of an SMS
     *
     * @var integer
     */
    protected $state;

    /**
     * The created date of an SMS
     *
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * The updated date of an SMS
     *
     * @var \DateTime
     */
    protected $updatedAt;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * Gets the id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     */
    public function setSender($sender)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * {@inheritDoc}
     */
    public function setRecipient($recipient)
    {
        $this->recipient = $recipient;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * {@inheritDoc}
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * {@inheritDoc}
     */
    public function setState($state)
    {
        if (!in_array($state, self::getStates())) {
            throw new \InvalidArgumentException();
        }

        $this->state = $state;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Gets all the states
     *
     * @return array
     */
    public static function getStates()
    {
        return array(
            self::STATE_SENT,
            self::STATE_ACCEPTED,
            self::STATE_REJECTED,
            self::STATE_DELIVERED,
            self::STATE_FAILED,
        );
    }
}
