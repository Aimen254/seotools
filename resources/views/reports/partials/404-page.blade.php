@if(isset($report['results'][$name]))
    <div class="border-top">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="d-flex align-items-center">
                                @include('reports.partials.status')

                                <div class="text-truncate font-weight-medium">{{ __('404 page') }}</div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-8">
                            @if($report['results'][$name]['passed'])
                                <div>
                                    {{ __('The website has 404 error pages.') }}
                                </div>
                            @else
                                @if($report->user_id == 0)
                                    @include('reports.partials.limited')
                                @else
                                    @foreach($report['results'][$name]['errors'] as $error => $details)
                                        <div class="{{ (!$loop->first) ? 'mt-3' : ''}}">
                                            @if($error == 'missing')
                                                {{ __('The website does not have 404 error pages.') }}
                                            @endif
                                        </div>
                                    @endforeach
                                @endif
                            @endif

                            @if($report->user_id)
                                <div class="small text-muted mt-1">
                                    <a href="{{ $report['results'][$name]['value'] }}" rel="nofollow noreferrer noopener" target="_blank" class="text-break">{{ $report['results'][$name]['value'] }}</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-auto">
                    <a href="#collapse{{ $name }}" class="text-secondary d-flex align-items-center" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapse{{ $name }}" data-tooltip="true" title="{{ __('More') }}">
                        @include('icons.info', ['class' => 'fill-current width-4 height-4'])&#8203;
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="collapse{{ Auth::check() && Auth::user()->default_export_detailed ? ' d-print-block' : '' }}" id="collapse{{ $name }}">
        <div class="card-body pt-0">
            <div class="alert alert-secondary mb-0">
                {{ __('The 404 webpage status informs the users and the search engines that a webpage is missing.') }}

                <hr>

                <div class="row">
                    <div class="col-12 col-md">
                        {{ __('Learn more') }}
                    </div>
                    <div class="col-12 col-md-auto">
                        <a href="https://www.bing.com/webmasters/help/404pages-best-practices-1c9f53b3" class="alert-link font-weight-medium d-flex align-items-center" target="_blank" rel="nofollow noreferrer noopener">Bing @include('icons.external', ['class' => 'fill-current width-3 height-3 ' . (__('lang_dir') == 'rtl' ? 'mr-1' : 'ml-1')])</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
