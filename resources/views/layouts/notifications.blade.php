<li class="nav-item dropdown">
    <a href="#" class="nav-link @if(Auth::user()->unseenPokesCount) nav-link-notify @endif" title="Notifications" data-toggle="dropdown">
        <i data-feather="bell"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
        <div class="bg-dark p-4 text-center d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Notifications</h5>
            <small class="opacity-7">{{ Auth::user()->unseenPokesCount }} unread</small>
        </div>
        <div>
            <ul class="list-group list-group-flush">
                @foreach ( Auth::user()->unseenPokes as $poke )
                    <li>
                        <x-poke.preview :size="'small'" :poke="$poke" />
                    </li>
                @endforeach
            </ul>
            @if ( !Auth::user()->unseenPokesCount )
                <div class="jumbotron bg-warning text-center mb-0">
                    <i class="fas fa-pizza-slice fa-3x mb-3"></i>
                    <h5>Up-to-date</h5>
                    <p>All pokes seen! Looks like you're up-to-date cap'tain! Yo Oh!</p>
                </div>
            @endif
        </div>
        @if ( Auth::user()->unseenPokesCount )
            <div class="p-2 text-right border-top">
                <ul class="list-inline small">
                    <li class="list-inline-item mb-0">
                        <form action="{{ route('pokes.see-all') }}" method="POST">
                            @csrf
                            <input type="submit" value="Mark All Read" class="dropdown-item">
                        </form>
                    </li>
                </ul>
            </div>
        @endif
    </div>
</li>