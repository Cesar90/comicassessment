@extends('layout.layout')
@section('content')
    <div class="container">
        <div class="">
            <h2 class="title">xkcd</h2>
        </div>
        <div class="container h-100 box">
            <form action="{{ route('navigationview' ) }}"
                  role="form" method="POST" id="frmNav">
                <div class="row h-100 justify-content-center align-items-center">
                    <div class="text-center">
                        <div class="col-md-8 ml-auto mr-auto">
                            <h2>
                                <strong>
                                    {!!  $viewData['comic']->title !!}
                                </strong>
                            </h2>
                        </div>
                        <div class="col-sm-12 col-md-12 ml-auto mr-auto littleSpaceTopBottom">
                            @if(!empty($viewData['comic']->prev))
                                <a href="{{ route('navigationview', ['comidId'=> $viewData['comic']->prev ]) }}"
                                   data-typenav="pre" data-comicid="<?php echo $viewData['comic']->prev; ?>"
                                   class="btn btn-primary btn-sm littleSpaceLeftRight jsbtnNav">< Prev<div class="ripple-container"></div>
                                </a>
                            @endif

                            @if(!empty($viewData['comic']->next))
                                    <a href="{{ route('navigationview', ['comidId'=> $viewData['comic']->next ]) }}"
                                       data-typenav="next" data-comicid="<?php echo $viewData['comic']->next; ?>"
                                       class="btn btn-primary btn-sm littleSpaceLeftRight jsbtnNav">Next >
                                        <div class="ripple-container"></div>
                                    </a>
                            @endif

                        </div>
                        <div class="col-md-12">
                            <img src="{{ $viewData['comic']->img }}" alt="{{ $viewData['comic']->title }}" class="img-raised rounded img-fluid">
                        </div>
                        <div class="col-md-8 ml-auto mr-auto">
                            <h4>
                                {{ $viewData['comic']->alt }}
                            </h4>
                        </div>
                        <div class="col-sm-12 col-md-12 ml-auto mr-auto littleSpaceTopBottom">
                            @if(!empty($viewData['comic']->prev))
                                <a href="{{ route('navigationview', ['comidId'=> $viewData['comic']->prev ]) }}"
                                   data-typenav="pre" data-comicid="<?php echo $viewData['comic']->prev; ?>"
                                   class="btn btn-primary btn-sm littleSpaceLeftRight jsbtnNav">< Prev
                                    <div class="ripple-container">
                                    </div>
                                </a>
                            @endif

                            @if(!empty($viewData['comic']->next))
                                <a href="{{ route('navigationview', ['comidId'=> $viewData['comic']->next ]) }}"
                                   data-typenav="next" data-comicid="<?php echo $viewData['comic']->next; ?>"
                                   class="btn btn-primary btn-sm littleSpaceLeftRight jsbtnNav">Next >
                                    <div class="ripple-container">
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                @if(!empty($viewData['comic']->prev))
                    <input type="hidden"
                           value="<?php echo $viewData['comic']->prev; ?>"
                           name="prevComic"  />
                @endif

                @if(!empty($viewData['comic']->next))
                    <input type="hidden"
                           value="<?php echo $viewData['comic']->next; ?>"
                           name="nextComic" />
                @endif
                <input type="hidden"
                       value=""
                       name="typenav"
                       id="typenav"/>
            </form>
        </div>
    </div>

    @push('scripts')
        <script src="<?php echo url('/') ?>/js/index.js"></script>
    @endpush
@stop