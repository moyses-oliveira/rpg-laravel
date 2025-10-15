<?php

namespace Modules\Blueprint\Framing\Stats;

class AdvancedEntityAttributesStats
{
    private int $dexterity = 0;
    private int $strength = 0;
    private int $constitution = 0;
    private int $intelligence = 0;
    private int $charisma = 0;
    private int $wisdom = 0;

    public function setAttributes(int $dexterity, int $strength, int $constitution, int $intelligence, int $charisma, int $wisdom): void
    {
        $this->dexterity = $dexterity;
        $this->strength = $strength;
        $this->constitution = $constitution;
        $this->intelligence = $intelligence;
        $this->charisma = $charisma;
        $this->wisdom = $wisdom;
    }

    public function DS(): int
    {
        return $this->dexterity;
    }

    public function ST(): int
    {
        return $this->strength;
    }

    public function CO(): int
    {
        return $this->constitution;
    }

    public function IN(): int
    {
        return $this->intelligence;
    }

    public function CH(): int
    {
        return $this->charisma;
    }

    public function WI(): int
    {
        return $this->wisdom;
    }

    public function modDexterity(int $value): void
    {
        $this->dexterity += $value;
    }

    public function modStrength(int $value): void
    {
        $this->strength += $value;
    }

    public function modConstitution(int $value): void
    {
        $this->constitution += $value;
    }

    public function modIntelligence(int $value): void
    {
        $this->intelligence += $value;
    }

    public function modCharisma(int $value): void
    {
        $this->charisma += $value;
    }

    public function modWisdom(int $value): void
    {
        $this->wisdom += $value;
    }
}
