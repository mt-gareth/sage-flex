@if(have_rows('motiontactic_flex'))
    @while(have_rows('motiontactic_flex')) @php(the_row())
    @includeIf('flex.' . get_row_layout())
    @endwhile
@endif
@php(the_content())
