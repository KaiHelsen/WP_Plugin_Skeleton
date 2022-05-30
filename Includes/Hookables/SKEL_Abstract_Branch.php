<?php

declare(strict_types=1);

namespace SKEL\Includes\Hookables;

use SKEL\includes\hookables\SKEL_I_Hookable_Component;

abstract class SKEL_Abstract_Branch implements SKEL_I_Hookable_Component
{
    use SKEL_Hookable_Branch_Trait;
}