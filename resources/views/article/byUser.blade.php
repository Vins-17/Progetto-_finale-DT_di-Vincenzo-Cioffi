<x-layout title="{{ $user->name }}">
    <header class="header pt-5 articleCont">
        <div class="container-fluid">
            <div class="row justify-content-center align-content-center h-100 mt-5">
                <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                    <h1 class="text-center text-bg-light p-2">Redattore: {{ $user->name }}</h1>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($articles as $article)
                <div class="col-12 col-md-3">
                    <x-card-article :article="$article" />
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
