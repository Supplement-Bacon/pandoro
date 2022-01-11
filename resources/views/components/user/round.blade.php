<figure class="avatar avatar-{{ $size }}">
    @if ( $link ) <a href="#" title="{{ $user->fullName }}" data-toggle="tooltip"> @endif
        @if ( $user->pictureUrl )
            <img src="{{ $user->pictureUrl }}" class="rounded-circle" alt="avatar">
        @else
            <span class="avatar-title bg-primary rounded-circle">{{ $user->initials }}</span>
        @endif
    @if ( $link ) </a> @endif
</figure>
