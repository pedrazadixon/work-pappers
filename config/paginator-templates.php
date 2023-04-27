<?php

return [
    'number'  => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',

    'current' => '<li class="page-item active"><a class="page-link text-white" href="{{url}}">{{text}}</a></li>',

    'first' => '<li class="page-item"><a class="page-link" href="{{url}}" aria-label="Previous"><span aria-hidden="true"><span class="material-icons">first_page</span></span></a></li>',
    'last'  => '<li class="page-item"><a class="page-link" href="{{url}}" aria-label="Previous"><span aria-hidden="true"><span class="material-icons">last_page</span></span></a></li>',

    'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}" aria-label="Previous"><span aria-hidden="true"><span class="material-icons">keyboard_arrow_left</span></span></a></li>',
    'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}" aria-label="Previous"><span aria-hidden="true"><span class="material-icons">keyboard_arrow_right</span></span></a></li>',

    'prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}" aria-label="Previous"><span aria-hidden="true"><span class="material-icons">keyboard_arrow_left</span></span></a></li>',
    'nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}" aria-label="Previous"><span aria-hidden="true"><span class="material-icons">keyboard_arrow_right</span></span></a></li>',
];
