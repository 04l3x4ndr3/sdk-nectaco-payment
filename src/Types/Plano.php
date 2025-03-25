<?php

namespace O4l3x4ndr3\SdkNectaco\Types;

class Plano
{
    private ?string $name;
    private ?string $description;
    private ?string $email;
    private ?int $setup_amount;
    private ?int $amount;
    private ?int $grace_period;
    private ?int $tolerance_period;
    private ?string $frequency;
    private ?int $interval;
    private ?string $logo;
    private ?string $currency;
    private ?string $payment_methods;
    private ?string $plan_expiration_date;
    private ?bool $has_expiration;
    private ?bool $expire_subscriptions;
    private ?int $subscription_duration;

    /**
     * @param string|null $name
     * @param string|null $description
     * @param string|null $email
     * @param int|null $setup_amount
     * @param int|null $amount
     * @param int|null $grace_period
     * @param int|null $tolerance_period
     * @param string|null $frequency
     * @param int|null $interval
     * @param string|null $logo
     * @param string|null $currency
     * @param string|null $payment_methods
     * @param string|null $plan_expiration_date
     * @param bool|null $has_expiration
     * @param bool|null $expire_subscriptions
     * @param int|null $subscription_duration
     */
    public function __construct(?string $name = null, ?string $description = null, ?string $email = null, ?int $setup_amount = null, ?int $amount = null, ?int $grace_period = null, ?int $tolerance_period = null, ?string $frequency = null, ?int $interval = null, ?string $logo = null, ?string $currency = null, ?string $payment_methods = null, ?string $plan_expiration_date = null, ?bool $has_expiration = null, ?bool $expire_subscriptions = null, ?int $subscription_duration = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->email = $email;
        $this->setup_amount = $setup_amount;
        $this->amount = $amount;
        $this->grace_period = $grace_period;
        $this->tolerance_period = $tolerance_period;
        $this->frequency = $frequency;
        $this->interval = $interval;
        $this->logo = $logo;
        $this->currency = $currency;
        $this->payment_methods = $payment_methods;
        $this->plan_expiration_date = $plan_expiration_date;
        $this->has_expiration = $has_expiration;
        $this->expire_subscriptions = $expire_subscriptions;
        $this->subscription_duration = $subscription_duration;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): Plano
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): Plano
    {
        $this->description = $description;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): Plano
    {
        $this->email = $email;
        return $this;
    }

    public function getSetupAmount(): ?int
    {
        return $this->setup_amount;
    }

    public function setSetupAmount(?int $setup_amount): Plano
    {
        $this->setup_amount = $setup_amount;
        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(?int $amount): Plano
    {
        $this->amount = $amount;
        return $this;
    }

    public function getGracePeriod(): ?int
    {
        return $this->grace_period;
    }

    public function setGracePeriod(?int $grace_period): Plano
    {
        $this->grace_period = $grace_period;
        return $this;
    }

    public function getTolerancePeriod(): ?int
    {
        return $this->tolerance_period;
    }

    public function setTolerancePeriod(?int $tolerance_period): Plano
    {
        $this->tolerance_period = $tolerance_period;
        return $this;
    }

    public function getFrequency(): ?string
    {
        return $this->frequency;
    }

    public function setFrequency(?string $frequency): Plano
    {
        $this->frequency = $frequency;
        return $this;
    }

    public function getInterval(): ?int
    {
        return $this->interval;
    }

    public function setInterval(?int $interval): Plano
    {
        $this->interval = $interval;
        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): Plano
    {
        $this->logo = $logo;
        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(?string $currency): Plano
    {
        $this->currency = $currency;
        return $this;
    }

    public function getPaymentMethods(): ?string
    {
        return $this->payment_methods;
    }

    public function setPaymentMethods(?string $payment_methods): Plano
    {
        $this->payment_methods = $payment_methods;
        return $this;
    }

    public function getPlanExpirationDate(): ?string
    {
        return $this->plan_expiration_date;
    }

    public function setPlanExpirationDate(?string $plan_expiration_date): Plano
    {
        $this->plan_expiration_date = $plan_expiration_date;
        return $this;
    }

    public function getHasExpiration(): ?bool
    {
        return $this->has_expiration;
    }

    public function setHasExpiration(?bool $has_expiration): Plano
    {
        $this->has_expiration = $has_expiration;
        return $this;
    }

    public function getExpireSubscriptions(): ?bool
    {
        return $this->expire_subscriptions;
    }

    public function setExpireSubscriptions(?bool $expire_subscriptions): Plano
    {
        $this->expire_subscriptions = $expire_subscriptions;
        return $this;
    }

    public function getSubscriptionDuration(): ?int
    {
        return $this->subscription_duration;
    }

    public function setSubscriptionDuration(?int $subscription_duration): Plano
    {
        $this->subscription_duration = $subscription_duration;
        return $this;
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}