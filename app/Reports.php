<?php

namespace App;

use App\User;
use Illuminate\Support\Facades\Auth;

class Reports
{
    private $totalUsers;
    private $TotalCategory;
    /**
     * @return integer
     */
    public function getTotalUsers()
    {
        if (is_null($this->totalUsers)) {
            $this->totalUsers = User::count();
        }

        return $this->totalUsers;
    }
    public function getTotalCategory()
    {
        if (is_null($this->TotalCategory)) {
            $this->TotalCategory = Category::count();
        }

        return $this->TotalCategory;
    }
}
