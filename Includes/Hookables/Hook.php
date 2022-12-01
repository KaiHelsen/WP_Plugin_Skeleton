<?php

declare(strict_types=1);

namespace SKEL\includes\hookables;

final class Hook
{
    public string $hook;
    public int $priority;

    /**
     * struct like class for holding 
     *
     * @param string $hook
     * @param integer $priority
     */
    public function __construct(string $hook, int $priority)
    {
        $this->hook = $hook;
        $this->priority = $priority;
    }
}
