<?php

namespace App\View\Components;

use App\Models\Customer;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class CustomerLogos extends Component
{
    public Collection $customers;

    public function __construct()
    {
        $this->customers = Customer::query()
            ->visible()
            ->with('media')
            ->inRandomOrder()
            ->get()
            ->filter(fn ($c) => $c->getFirstMediaUrl('logo'));
    }

    public function render(): View|Closure|string
    {
        return view('components.customer-logos');
    }
}
