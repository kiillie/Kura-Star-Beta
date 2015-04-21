@if ($breadcrumbs)
    <div class="breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$breadcrumb->last)
                <a href="{{{ $breadcrumb->url }}}">{{{ $breadcrumb->title }}}</a> &middot;
            @else
                <span>{{{ $breadcrumb->title }}}</span>
            @endif
        @endforeach
    </div>
@endif
