<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Clickup connect') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Connect to Clickup') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (Auth::user()->cu_key)
                            <div class="alert alert-info" role="alert">
                                {{ __('You have already connected your ClickUp account.') }}
                            </div>
                            <form action="{{ route('clickup.disconnect') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Disconnect Clickup') }}
                                </button>
                            </form>
                        @else
                            <a href="{{ route('clickup.authorize') }}" class="btn btn-primary">
                                {{ __('Connect Clickup') }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
