<style>
    .page-header {
        background-image:linear-gradient(to bottom, rgba(20, 20, 20, 0.7), rgba(20, 20, 20, 0.7)), url({{getFile(config('location.logo.path').'banner.jpg')}});
    }
</style>
@if(!request()->routeIs('home'))
    <!-- PAGE-BANNER -->
    <section class="contact-page">
        <section class="page-header">
            <div class="container">
                <div class="about-header-content">
                    <h4 class="font-mont text-14 font-weight-bold text-uppercase base">@lang($basic->site_title)</h4>
                    <h1 class="font-mont text-40 font-weight-bold white">@yield('title')</h1>
                </div>
            </div>
        </section>
    </section>
    <!-- /PAGE-BANNER -->
@endif
