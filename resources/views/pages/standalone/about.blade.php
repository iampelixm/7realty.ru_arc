@if ($agent->isMobile())
    @extends('pages.standalone.about_mobile')
@else
    @extends('pages.standalone.about_desktop')
@endif
