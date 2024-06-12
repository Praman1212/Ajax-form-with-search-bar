<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;
// use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class UniqueNameInClub implements Rule
{
    private $club;
    private $crudId;

    public function __construct($club, $crudId = null)
    {
        $this->club = $club;
        $this->crudId = $crudId;
    }

    public function passes($attribute, $value)
    {
        $query = DB::table('cruds')
            ->where('name', $value)
            ->where('club', $this->club);

        if ($this->crudId) {
            $query->where('id', '<>', $this->crudId);
        }

        return !$query->exists();
    }

    public function message()
    {
        return 'The name has already been taken in this club.';
    }
}
