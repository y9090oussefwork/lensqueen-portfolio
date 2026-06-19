<?php

namespace App\Providers;


use App\Models\ContentDetails;
use App\Models\Language;
use App\Models\Template;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        try {
            DB::connection()->getPdo();


            $data['basic'] = (object)config('basic');
            $data['theme'] = template();
            $data['themeTrue'] = template(true);
            $data['loginImage'] = Template::setLang()->templateMedia()->where('section_name', 'login')->first();
            View::share($data);

            view()->composer(['admin.ticket.nav', 'dashboard'], function ($view) {
                $view->with('pending', Ticket::whereIn('status', [0, 2])->latest()->with('user')->limit(10)->with('lastReply')->get());
            });

            view()->composer([
                $data['theme'] . 'partials.footer',
                $data['theme'] . 'partials.topbar-auth'
            ], function ($view) {
                $templateSection = ['contact-us'];
                $view->with('templates', Template::setLang()->templateMedia()->whereIn('section_name', $templateSection)->get()->groupBy('section_name'));

                $contentSection = ['social'];
                $view->with('contentDetails', ContentDetails::select('id', 'content_id', 'description')
                    ->whereHas('content', function ($query) use ($contentSection) {
                        return $query->whereIn('name', $contentSection);
                    })
                    ->with(['content:id,name',
                        'content.contentMedia' => function ($q) {
                            $q->select(['content_id', 'description']);
                        }])
                    ->get()->groupBy('content.name'));


                $view->with('languages', Language::where('is_active', 1)->get());
            });

        } catch (\Exception $e) {

        }

    }
}
