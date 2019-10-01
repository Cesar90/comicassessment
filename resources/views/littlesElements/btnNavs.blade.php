<div class="col-sm-12 col-md-12 ml-auto mr-auto littleSpaceTopBottom">
    @if(!empty($viewData['comic']->prev))
        <a href="{{ route('navigationview', ['comidId'=> $viewData['comic']->prev ]) }}"
           data-typenav="pre" data-comicid="<?php echo $viewData['comic']->prev; ?>"
           class="btn btn-primary btn-sm littleSpaceLeftRight jsbtnNav customBangersFont font18px">< Prev<div class="ripple-container"></div>
        </a>
    @endif

    @if(!empty($viewData['comic']->next))
        <a href="{{ route('navigationview', ['comidId'=> $viewData['comic']->next ]) }}"
           data-typenav="next" data-comicid="<?php echo $viewData['comic']->next; ?>"
           class="btn btn-primary btn-sm littleSpaceLeftRight jsbtnNav customBangersFont font18px">Next >
            <div class="ripple-container"></div>
        </a>
    @endif
</div>