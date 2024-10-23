<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Formulaire') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto flex flex-col gap-5 sm:px-6 lg:px-8">
            <p>this is the form answer page </p>
            @foreach ($forms as $form)
                <p>{{$form->id}}</p>
                <p>{{$form->name_representative}}</p>
            @endforeach
        </div>
    </div>
</x-app-layout>
