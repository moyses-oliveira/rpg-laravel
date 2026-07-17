<?php

namespace Modules\Blueprint\Framing\Stats;

class InteractiveTokenStats
{
    // Visual identity
    private string $tokenKey = '';
    private int $size = 1;          // tile footprint (1 = 1x1, 2 = 2x2)
    private int $facing = 0;        // degrees 0–315 (0 = north, clockwise)
    private int $tintColor = 0x000000; // border/team color for Pixi strokeToken

    // Fog of war
    private bool $isVisible = true; // rendered on VTT for all players
    private bool $isHidden = false; // actively hiding (stealth)
    private int $sightRange = 6;    // tiles the token can see through fog

    // Combat turn economy
    private int $initiative = 0;
    private int $actionPoints = 1;
    private int $movementPoints = 6; // tiles per turn
    private int $actionsUsed = 0;
    private int $movementUsed = 0;

    // Interaction state (managed by VTT controller)
    private bool $isPlayerControlled = false;
    private bool $isSelected = false;
    private bool $isActing = false;  // it is currently this token's turn

    // Gameplay range
    private int $reach = 1; // melee reach in tiles

    // --- Turn economy ---

    public function canAct(): bool
    {
        return $this->actionsUsed < $this->actionPoints;
    }

    public function canMove(): bool
    {
        return $this->movementUsed < $this->movementPoints;
    }

    public function remainingMovement(): int
    {
        return max($this->movementPoints - $this->movementUsed, 0);
    }

    public function spendAction(): void
    {
        $this->actionsUsed = min($this->actionsUsed + 1, $this->actionPoints);
    }

    public function spendMovement(int $tiles): void
    {
        $this->movementUsed = min($this->movementUsed + $tiles, $this->movementPoints);
    }

    public function resetTurn(): void
    {
        $this->actionsUsed = 0;
        $this->movementUsed = 0;
        $this->isActing = false;
    }

    // --- Visual ---

    public function getTokenKey(): string
    {
        return $this->tokenKey;
    }

    public function setTokenKey(string $tokenKey): void
    {
        $this->tokenKey = $tokenKey;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function setSize(int $size): void
    {
        $this->size = max(1, $size);
    }

    public function getFacing(): int
    {
        return $this->facing;
    }

    public function setFacing(int $degrees): void
    {
        $this->facing = (($degrees % 360) + 360) % 360;
    }

    public function getTintColor(): int
    {
        return $this->tintColor;
    }

    public function setTintColor(int $hexColor): void
    {
        $this->tintColor = $hexColor;
    }

    // --- Visibility ---

    public function isVisible(): bool
    {
        return $this->isVisible;
    }

    public function setVisible(bool $visible): void
    {
        $this->isVisible = $visible;
    }

    public function isHidden(): bool
    {
        return $this->isHidden;
    }

    public function setHidden(bool $hidden): void
    {
        $this->isHidden = $hidden;
    }

    public function getSightRange(): int
    {
        return $this->sightRange;
    }

    public function setSightRange(int $tiles): void
    {
        $this->sightRange = max(0, $tiles);
    }

    // --- Initiative ---

    public function getInitiative(): int
    {
        return $this->initiative;
    }

    public function setInitiative(int $initiative): void
    {
        $this->initiative = $initiative;
    }

    // --- Action economy config ---

    public function getActionPoints(): int
    {
        return $this->actionPoints;
    }

    public function setActionPoints(int $points): void
    {
        $this->actionPoints = max(0, $points);
    }

    public function getMovementPoints(): int
    {
        return $this->movementPoints;
    }

    public function setMovementPoints(int $tiles): void
    {
        $this->movementPoints = max(0, $tiles);
    }

    public function getActionsUsed(): int
    {
        return $this->actionsUsed;
    }

    public function getMovementUsed(): int
    {
        return $this->movementUsed;
    }

    // --- Control flags ---

    public function isPlayerControlled(): bool
    {
        return $this->isPlayerControlled;
    }

    public function setPlayerControlled(bool $controlled): void
    {
        $this->isPlayerControlled = $controlled;
    }

    public function isSelected(): bool
    {
        return $this->isSelected;
    }

    public function setSelected(bool $selected): void
    {
        $this->isSelected = $selected;
    }

    public function isActing(): bool
    {
        return $this->isActing;
    }

    public function setActing(bool $acting): void
    {
        $this->isActing = $acting;
    }

    // --- Range ---

    public function getReach(): int
    {
        return $this->reach;
    }

    public function setReach(int $tiles): void
    {
        $this->reach = max(1, $tiles);
    }
}
