@if ($breadcrumbs)
    <div class="breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)
            @if (!$breadcrumb->last)
                <a href="{{{ $breadcrumb->url }}}">{{{ $breadcrumb->title }}}</a> &middot;
            @else
                <span class="active">{{{ $breadcrumb->title }}}</span>
            @endif
        @endforeach
    </div>
@endif