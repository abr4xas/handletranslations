<?php

namespace Abr4xas\HandleTranslations;

use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class HandleTranslations extends Tool
{
    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
        Nova::script('handleTranslations', __DIR__.'/../dist/js/tool.js');
        Nova::style('handleTranslations', __DIR__.'/../dist/css/tool.css');
    }

    /**
     * Build the view that renders the navigation links for the tool.
     *
     * @return \Illuminate\View\View
     */
    public function renderNavigation()
    {
        return view('handleTranslations::navigation');
    }
}
