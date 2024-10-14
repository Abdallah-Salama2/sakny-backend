<?php

namespace App\Policies;

use App\Models\Property;
use App\Models\Agent;

class PropertyPolicy
{
    public function update(Agent $user, Property $property)
    {
        return $user->id === $property->by_agent_id;
    }

    public function delete(Agent $user, Property $property)
    {
        return $user->id === $property->by_agent_id;
    }
}
