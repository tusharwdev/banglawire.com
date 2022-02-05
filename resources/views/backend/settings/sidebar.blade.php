<div class="list-group">
    <a href="{{ route('secure.settings.general') }}" class="list-group-item list-group-item-action
{{ \Illuminate\Support\Facades\Route::is('secure.settings.general') ? 'active' : '' }}">General
    </a>
    <a href="{{ route('secure.settings.appearance') }}" class="list-group-item list-group-item-action
{{ \Illuminate\Support\Facades\Route::is('secure.settings.appearance') ? 'active' : '' }}">Appearance
    </a>
    <a href="{{ route('secure.settings.mail') }}" class="list-group-item list-group-item-action
{{ \Illuminate\Support\Facades\Route::is('secure.settings.mail') ? 'active' : '' }}">Mail
    </a>
    <a href="{{ route('secure.settings.socialite') }}" class="list-group-item list-group-item-action
{{ \Illuminate\Support\Facades\Route::is('secure.settings.socialite') ? 'active' : '' }}">Socialite
    </a>

</div>
