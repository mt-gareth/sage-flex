@if(have_rows('flexible_sections'))
    @while(have_rows('flexible_sections')) @php(the_row())
    @if(!get_sub_field('hide_section'))
        @includeIf('flex.' . get_row_layout())
    @endif
    @endwhile
@endif
@php(the_content())
