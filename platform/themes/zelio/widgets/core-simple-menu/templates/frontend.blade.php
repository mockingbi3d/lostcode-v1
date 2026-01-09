@php
    $footerStyle = get_footer_style();
@endphp

<div @class(['navigation align-items-center justify-content-center flex-wrap gap-4 my-4', 'd-none d-md-flex' => $footerStyle == 1, 'd-flex' => $footerStyle != 1])>
    @foreach($items as $item)
        @if (($label = $item->label) && ($url = $item->url))
            <a
                href="{{ url($url) }}"
                @class(['fs-5' => $footerStyle == 1, 'fs-6' => $footerStyle != 1])
                {!! $item->attributes ? BaseHelper::clean($item->attributes) : null !!}
                @if ($item->is_open_new_tab) target="_blank" @endif
            >
                {!! BaseHelper::clean($label) !!}
            </a>
        @endif
    @endforeach
</div>
