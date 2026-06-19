@extends($theme.'layouts.app')
@section('title',trans('Services'))

@section('content')
    @include($theme.'sections.services')
    @include($theme.'sections.behind-the-scene')
    @include($theme.'sections.why-chose-us')
    @include($theme.'sections.plan')
    @include($theme.'sections.statistics')
    @include($theme.'sections.testimonial')
    @include($theme.'sections.instagram')
@endsection
