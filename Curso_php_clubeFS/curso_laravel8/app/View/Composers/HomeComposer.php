<?php
 
namespace App\View\Composers;
 
use App\Repositories\UserRepository;
use Illuminate\View\View;
 
class HomeComposer
{
    /**
     * The user repository implementation.
     *
     * @var \App\Repositories\UserRepository
     */
    protected $data;
 
    /**
     * Create a new profile composer.
     *
     * @param  \App\Repositories\UserRepository  $data
     * @return void
     */
    public function __construct()
    {
        // Dependencies are automatically resolved by the service container...
        $this->data = 'Samuel composer';
    }
 
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('data', $this->data);
    }
}