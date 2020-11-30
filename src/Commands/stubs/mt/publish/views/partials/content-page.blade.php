@if(have_rows('flexible_sections'))
    @while(have_rows('flexible_sections')) @php(the_row())
    @includeIf('flex.' . get_row_layout())
    @endwhile
@endif
@php(the_content())
