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
                    <form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
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
                                                placeholder="Title..." value="{{ $article->title->en }}"
                                                name="title[en]" required>

                                        </div>

                                        <div class="flex flex-col gap-[0.5rem]">
                                            <label for="description_en" class="w-full font-bolder text-base">Article
                                                Description: </label>
                                            {{-- <textarea class="rounded w-full" type="text" placeholder="Description..." id="description_en" required
                                                name="description[en]" rows="5">{{ $article->description->en }}</textarea> --}}

                                            <div id="quill-editor_en" class="mb-3" style="height: 300px;"></div>
                                            <textarea rows="3" class="w-full hidden" name="description[en]" id="description_en">{{ $article->description->en }}</textarea>
                                        </div>


                                        <div class="flex flex-col gap-[0.5rem]">
                                            <label for="tags_en" class="w-full font-bolder text-base">Article
                                                Tags:</label>
                                            <input type="text" class="rounded w-full" id="tags_en"
                                                placeholder="Tags..." value="{{ $article->tags->en }}" name="tags[en]">
                                        </div>
                                    </div>
                                </div>


                                <div x-show="tab === 'العربية'">
                                    <div class="flex flex-col gap-y-[0.75rem]">
                                        <div class="flex flex-col gap-[0.5rem] text-end">
                                            <label for="title_ar" class="text-base">الاسم</label>
                                            <input class="rounded text-end" type="text" placeholder="...الاسم"
                                                name="title[ar]" id="title_ar" value="{{ $article->title->ar }}"
                                                required>
                                        </div>

                                        <div class="flex flex-col gap-[0.5rem]">
                                            <label for="description_ar" class="text-base text-end">وصف الحدث</label>
                                            {{-- <textarea class="rounded text-end" type="text" placeholder="...وصف الحدث" name="description[ar]" id="description_ar"
                                                rows="5" required>{{ $article->description->ar }}</textarea> --}}

                                            <div id="quill-editor_ar" class="mb-3" style="height: 300px;"></div>
                                            <textarea rows="3" class="w-full hidden" name="description[ar]" id="description_ar">{{ $article->description->ar }}</textarea>
                                        </div>

                                        <div class="flex flex-col gap-[0.5rem]">
                                            <label for="tags_ar" class="w-full font-bolder text-base text-end">:علامات
                                                المقال</label>
                                            <input type="text" class="rounded w-full text-end" id="tags_ar"
                                                placeholder="...العلامات" value="{{ $article->tags->ar }}"
                                                name="tags[ar]">
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-col gap-2">
                                    <p class="text-base m-0">Images</p>

                                    {{-- <img class="w-full h-[50vh] object-cover rounded border"
                                        src="{{ asset('storage/images/' . $article->image) }}" alt=""> --}}

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
                                        name="image" id="image">
                                </div>

                            </div>
                        </div>
                        <div class="flex items-center justify-center">
                            <button type="submit" class="bg-alpha rounded px-5 py-2 text-white w-[97%]">
                                Update Article
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (document.getElementById('description_en')) {
                var editor_en = new Quill('#quill-editor_en', {
                    theme: 'snow',
                    modules: {
                        toolbar: [
                            [{
                                header: [1, 2, 3, false]
                            }],
                            ['bold', 'underline', 'code', 'strike', {
                                align: ['justify', 'center', 'right']
                            }],

                            ['link', {
                                list: 'ordered'
                            }, {
                                list: 'bullet'
                            }]
                        ],
                    },
                });

                // i have no f idea what this is
                var desc_en = @json($article->description->en);
                editor_en.clipboard.dangerouslyPasteHTML(desc_en);


                var quillEditor_en = document.getElementById('description_en');
                editor_en.on('text-change', function() {
                    quillEditor_en.value = editor_en.root.innerHTML;
                });
                quillEditor_en.addEventListener('input', function() {
                    editor_en.root.innerHTML = quillEditor_en.value;
                });
            }
            var quillEditor_en = document.getElementById('description_en');
            editor_en.on('text-change', function() {
                quillEditor_en.value = editor.root.innerHTML;
            });
            quillEditor_en.addEventListener('input', function() {
                editor_en.root.innerHTML = quillEditor_en.value;
            });


            if (document.getElementById('description_ar')) {
                var editor_ar = new Quill('#quill-editor_ar', {
                    theme: 'snow',
                    modules: {
                        toolbar: [
                            [{
                                header: [1, 2, 3, false]
                            }],
                            ['bold', 'underline', 'code', 'strike', {
                                align: ['justify', 'center', 'right']
                            }],

                            ['link', {
                                list: 'ordered'
                            }, {
                                list: 'bullet'
                            }]
                        ],
                    },
                });

                var desc_ar = @json($article->description->ar);
                editor_ar.clipboard.dangerouslyPasteHTML(desc_ar);
                var quillEditor_ar = document.getElementById('description_ar');
                editor_ar.on('text-change', function() {
                    quillEditor_ar.value = editor_ar.root.innerHTML;
                });
                quillEditor_ar.addEventListener('input', function() {
                    editor_ar.root.innerHTML = quillEditor_ar.value;
                });
            }
            var quillEditor_ar = document.getElementById('description_ar');
            editor_ar.on('text-change', function() {
                quillEditor_ar.value = editor_ar.root.innerHTML;
            });
            quillEditor_ar.addEventListener('input', function() {
                editor_ar.root.innerHTML = quillEditor_ar.value;
            });
        });
    </script>
</x-app-layout>
