<?php

namespace App\Providers;


use Carbon\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        setLocale(LC_TIME,"tr_TR");
        Carbon::setLocale("tr");

        config()->set("ayarlar",\App\Ayar::lists("value","name")->all());

        $this->app["form"]->component('bsText', 'form_components.text', ['name','label_name', 'value' => null, 'attributes' => []]);
        $this->app["form"]->component('bsPassword', 'form_components.password', ['name','label_name', 'attributes' => []]);
        $this->app["form"]->component('bsSubmit', 'form_components.submit', ['name', 'url' => URL::previous()]);
        $this->app["form"]->component('bsCheckbox', 'form_components.checkbox', ['name', 'label_name', 'elemanlar' => [] ]);
        $this->app["form"]->component('bsFile', 'form_components.file', ['name', 'label_name']);



    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
