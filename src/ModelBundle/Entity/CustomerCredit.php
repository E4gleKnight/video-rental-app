<?php

namespace ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CustomerCredit
 *
 * @ORM\Table(name="customer_credit")
 * @ORM\Entity(repositoryClass="ModelBundle\Repository\CustomerCreditRepository")
 */
class CustomerCredit
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="paymentDate", type="date")
     */
    private $paymentDate;

    /**
     * @var int
     *
     * @ORM\Column(name="creditAmount", type="integer")
     */
    private $creditAmount;

    /**
     * @var Customer
     * @ORM\ManyToOne(
     *     targetEntity="ModelBundle\Entity\Customer",
     *     inversedBy="creditOperations")
     */
    private $customer;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set paymentDate
     *
     * @param \DateTime $paymentDate
     *
     * @return CustomerCredit
     */
    public function setPaymentDate($paymentDate)
    {
        $this->paymentDate = $paymentDate;

        return $this;
    }

    /**
     * Get paymentDate
     *
     * @return \DateTime
     */
    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    /**
     * Set creditAmount
     *
     * @param integer $creditAmount
     *
     * @return CustomerCredit
     */
    public function setCreditAmount($creditAmount)
    {
        $this->creditAmount = $creditAmount;

        return $this;
    }

    /**
     * Get creditAmount
     *
     * @return int
     */
    public function getCreditAmount()
    {
        return $this->creditAmount;
    }

    /**
     * Set customer
     *
     * @param \ModelBundle\Entity\Customer $customer
     *
     * @return CustomerCredit
     */
    public function setCustomer(\ModelBundle\Entity\Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \ModelBundle\Entity\Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }
}
