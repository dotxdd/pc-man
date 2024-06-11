<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Trello connect') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Connect to Trello') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (Auth::user()->tr_key)
                            <div class="alert alert-info" role="alert">
                                {{ __('You have already connected your Trello account.') }}
                            </div>
                            <form action="{{ route('trello.disconnect') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Disconnect Trello') }}
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login.trello') }}" class="btn btn-primary">
                                {{ __('Connect Trello') }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
