<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- form for creating an article --}}
                    <div>
                        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div x-data="{ tab: 'English' }" class="flex-[44%] p-[1.25rem] bg-white rounded-lg">
                                <h5 class="mb-[1rem]">Create An Article: </h5>

                                <div class="flex bg-gray-200 w-full justify-between gap-2 p-1 rounded-lg">
                                    @foreach (['English', 'العربية'] as $language)
                                        <button @click="tab = '{{ $language }}'"
                                            :class="{ 'bg-white text-black': tab === '{{ $language }}', 'bg-transparent text-black': tab !== '{{ $language }}' }"
                                            type="button" class="w-1/2 rounded-md font-medium p-1">
                                            {{ $language }}
                                        </button>
                                    @endforeach
                                </div>

                                <div class="flex flex-col gap-2 mt-[1rem]">
                                    <div x-show="tab === 'English'">
                                        <div class="flex flex-col gap-y-[0.75rem]">
                                            <div class="flex flex-col gap-[0.5rem]">
                                                <label for="title_en" class="w-full font-bolder text-base">Article
                                                    Title: </label>
                                                <input class="rounded w-full" type="text" id="title_en"
                                                    placeholder="Title..." value="{{ old('title.en') }}"
                                                    name="title[en]" required>
                                            </div>

                                            <div class="flex flex-col gap-[0.5rem]">
                                                <label for="description_en" class="w-full font-bolder text-base">Article
                                                    Description: </label>
                                                <textarea class="rounded w-full" type="text" placeholder="Description..." id="description_en" required
                                                    name="description[en]" rows="5">{{ old('description.en') }}</textarea>
                                            </div>


                                            <div class="flex flex-col gap-[0.5rem]">
                                                <label for="tags_en" class="w-full font-bolder text-base">Article
                                                    Tags:</label>
                                                <input type="text" class="rounded w-full" id="tags_en"
                                                    placeholder="Tags..." value="{{ old('tags.en') }}" name="tags[en]">
                                            </div>
                                        </div>
                                    </div>


                                    <div x-show="tab === 'العربية'">
                                        <div class="flex flex-col gap-y-[0.75rem] text-end">
                                            <div class="flex flex-col gap-[0.5rem]">
                                                <label for="title_ar" class="text-base">الاسم</label>
                                                <input class="rounded text-end" type="text" placeholder="...الاسم"
                                                    name="title[ar]" id="title_ar" value="{{ old('title.ar') }}"
                                                    required>
                                            </div>

                                            <div class="flex flex-col gap-[0.5rem]">
                                                <label for="description_ar" class="text-base">وصف الحدث</label>
                                                <textarea class="rounded text-end" type="text" placeholder="...وصف الحدث" name="description[ar]" id="description_ar"
                                                    rows="5" required>{{ old('description.ar') }}</textarea>
                                            </div>

                                            <div class="flex flex-col gap-[0.5rem]">
                                                <label for="tags_ar"
                                                    class="w-full font-bolder text-base text-end">:علامات المقال</label>
                                                <input type="text" class="rounded w-full text-end" id="tags_ar"
                                                    placeholder="...العلامات" value="{{ old('tags.ar') }}"
                                                    name="tags[ar]">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-col gap-2">
                                        <p class="text-base m-0">Images</p>
                                        <label for="image"
                                            class="p-[0.75rem] cursor-pointer flex gap-2 items-center border-[1.5px] border-gray-500 rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6 flex-shrink-0">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                            </svg>
                                            <span id="imagesPlaceholder" class="text-base text-gray-500">
                                                upload images
                                            </span>
                                        </label>
                                        <input class="hidden" type="file" placeholder="image" accept="image/*"
                                            name="image" id="image" required>
                                    </div>

                                </div>
                            </div>
                            <button type="submit" class="bg-black rounded px-5 py-2 text-white w-full">
                                Create Article
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
