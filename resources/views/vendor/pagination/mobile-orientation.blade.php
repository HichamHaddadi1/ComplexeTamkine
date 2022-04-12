@if ($paginator->hasPages())

    <ul class="pagination modal-4">

        @if ($paginator->onFirstPage())

            <li>
                <a href="javascript:void(0)" class="prev" style="cursor: default;background: #17a2b8bd;">
                    <i class="fa fa-chevron-left"></i>
                    @lang('pagination.previous')
                </a>
            </li>

        @else

            <li>
                <a href="{{ $paginator->previousPageUrl() }}" class="prev">
                    <i class="fa fa-chevron-left"></i>
                    @lang('pagination.previous')
                </a>
            </li>

        @endif

        {{--    @if($paginator->currentPage() > 3)--}}
        {{--        <li class="hidden-xs"><a href="{{ $paginator->url(1) }}">1</a></li>--}}
        {{--    @endif--}}
        {{--    @if($paginator->currentPage() >= 4)--}}
        {{--        <li> <a href="javascript:void(0)" style="cursor: default">... </a></li>--}}
        {{--    @endif--}}
    <!--    --><?php //$j=0 ?>
        @foreach(range(1, $paginator->lastPage()) as $i)
            @if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
                @if ($i == $paginator->currentPage())
                    <li> <a href="javascript:void(0)" class="active">{{ $i }}</a></li>
                @elseif ($i === $paginator->currentPage()-1  || $i === $paginator->currentPage()+1)
                    <li><a href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                    {{--                    <li> <a href="{{ $url }}">{{ $page }}</a></li>--}}
                @endif
            @endif
        @endforeach
        {{--    @if($paginator->currentPage() < $paginator->lastPage() - 3)--}}
        {{--        <li><span>...</span></li>--}}
        {{--        <li> <a href="javascript:void(0)" style="cursor: default">... </a></li>--}}
        {{--    @endif--}}
        {{--    @if($paginator->currentPage() < $paginator->lastPage() - 2)--}}
        {{--        <li class="hidden-xs"><a href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>--}}
        {{--    @endif--}}

        {{--        {{ dd($elements) }}--}}

        {{--    @foreach ($elements as $element)--}}



        {{--        --}}{{-- "Three Dots" Separator --}}

        {{--        @if (is_string($element))--}}

        {{--                <li> <a href="javascript:void(0)" style="cursor: default">{{ $element }}</a></li>--}}

        {{--            <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>--}}

        {{--        @endif--}}



        {{--        --}}{{-- Array Of Links --}}

        {{--        @if (is_array($element))--}}

        {{--            @foreach ($element as $page => $url)--}}

        {{--                @if ($page == $paginator->currentPage())--}}

        {{--                        <li> <a href="javascript:void(0)" class="active">{{ $page }}</a></li>--}}

        {{--                    <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>--}}

        {{--                @elseif (($page === $paginator->currentPage() + 1--}}
        {{--                       || $page === $paginator->currentPage() + 2)--}}
        {{--                       || $page === $paginator->lastPage())--}}

        {{--                        <li> <a href="{{ $url }}">{{ $page }}</a></li>--}}

        {{--                @elseif ($page === $paginator->lastPage()-1)--}}
        {{--                        <li> <a href="javascript:void(0)" style="cursor: default">... </a></li>--}}
        {{--                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>--}}

        {{--                @endif--}}

        {{--            @endforeach--}}

        {{--        @endif--}}

        {{--            @if (is_array($element))--}}

        {{--                @foreach ($element as $page => $url)--}}

        {{--                    @if ($paginator->currentPage() > 4 && $page === 2)--}}
        {{--                        <li> <a href="javascript:void(0)" style="cursor: default">... </a></li>--}}
        {{--                    @endif--}}

        {{--                    <!--  Show active page else show the first and last two pages from current page.  -->--}}
        {{--                    @if ($page == $paginator->currentPage())--}}
        {{--                            <li> <a href="javascript:void(0)" class="active">{{ $page }}</a></li>--}}
        {{--                    @elseif ($page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() + 2 || $page === $paginator->currentPage() - 1 || $page === $paginator->currentPage() - 2 || $page === $paginator->lastPage() || $page === 1)--}}
        {{--                            <li> <a href="{{ $url }}">{{ $page }}</a></li>--}}
        {{--                    @endif--}}

        {{--                    <!--  Use three dots when current page is away from end.  -->--}}
        {{--                    @if ($paginator->currentPage() < $paginator->lastPage() - 3 && $page === $paginator->lastPage() - 1)--}}
        {{--                            <li> <a href="javascript:void(0)" style="cursor: default">... </a></li>--}}
        {{--                    @endif--}}

        {{--                    @if ($page == $paginator->currentPage())--}}

        {{--                        <li> <a href="javascript:void(0)" class="active">{{ $page }}</a></li>--}}


        {{--                    @elseif (($page === $paginator->currentPage() + 1--}}
        {{--                           || $page === $paginator->currentPage() + 2)--}}
        {{--                           || $page === $paginator->lastPage())--}}

        {{--                        <li> <a href="{{ $url }}">{{ $page }}</a></li>--}}

        {{--                    @elseif ($page === $paginator->lastPage()-1)--}}
        {{--                        <li> <a href="javascript:void(0)" style="cursor: default">... </a></li>--}}

        {{--                    @endif--}}

        {{--                @endforeach--}}

        {{--            @endif--}}

        {{--    @endforeach--}}



        {{-- Next Page Link --}}

        @if ($paginator->hasMorePages())

            {{--        <li class="page-item">--}}

            {{--            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>--}}

            {{--        </li>--}}

            <li>

                <a href="{{ $paginator->nextPageUrl() }}" class="next"> @lang('pagination.next')

                    <i class="fa fa-chevron-right"></i>

                </a>

            </li>

        @else

            {{--        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">--}}

            {{--            <span class="page-link" aria-hidden="true">&rsaquo;</span>--}}

            {{--        </li>--}}

            <li>

                <a href="javascript:void(0)" class="next" style="   cursor: default;background: #17a2b8bd;"> @lang('pagination.next')

                    <i class="fa fa-chevron-right"></i>

                </a>

            </li>

        @endif





    </ul>

@endif

