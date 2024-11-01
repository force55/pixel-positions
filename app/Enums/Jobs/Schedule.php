<?php

    namespace App\Enums\Jobs;


    enum Schedule: string
    {
        case PART_TIME = 'Part Time';
        case FULL_TIME = 'Full Time';

        public function getLabel(): ?string
        {
            return $this->value;
        }
    }
