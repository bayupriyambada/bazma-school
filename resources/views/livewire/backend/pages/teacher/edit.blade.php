@section('pageTitle', 'Edit ' . $name . '- SMK TI BAZMA')
<div>
    <form wire:submit.prevent="update">
        <div class="row row-cards">
            <div class="col-md-12 col-xl-8">
                <div class="row row-cards">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <label class="form-label">Your Name</label>
                                <input type="text" wire:model.defer="name"
                                    class="form-control @error('name') is-invalid @enderror" name="example-text-input"
                                    placeholder="Eg: Teacher Example">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <label class="form-label">Description</label>
                                <div wire:ignore>
                                    <textarea cols="10" style="height: 300px;" wire:change="description" class="form-control" name="description"
                                        id="description">{{ $description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-4">
                <div class="row row-cards">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('pages.teacher.index') }}" class="btn btn-yellow ms-auto">Go Back</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <label class="form-label">Choose Lesson</label>
                                <div wire:ignore>
                                    <select class="form-control" id="select2" wire:model="lesson_uuid">
                                        <option disabled>Select Option</option>
                                        @foreach ($lessons as $item)
                                            <option value="{{ $item->uuid }}">{{ $item->name_lesson }} -
                                                {{ $item->code_lesson }}</option>
                                        @endforeach
                                    </select>
                                    @error('lesson_uuid')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <label class="form-label">Picture</label>
                                <input type="file" class="form-control" id="exampleInputName" wire:model="picture">
                                @error('picture')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div wire:loading wire:target="picture">Uploading...</div>
                            </div>
                        </div>
                    </div>
                    @if ($oldPicture)
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <p><b>Picture Before</b></p>
                                    <img height="150" width="100%" src="{{ Storage::url($oldPicture) }}">
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </form>
</div>
@push('js')
    <script>
        $(document).ready(function() {
            $('#select2').select2();
            $('#select2').on('change', function(e) {
                var data = $('#select2').select2("val");
                @this.set('lesson_uuid', data);
            });
        });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', ],
                codeBlock: {
                    languages: [
                        // Do not render the CSS class for the plain text code blocks.
                        {
                            language: 'plaintext',
                            label: 'Plain text',
                            class: ''
                        },

                        // Use the "php-code" class for PHP code blocks.
                        {
                            language: 'php',
                            label: 'PHP',
                            class: 'php-code'
                        },

                        // Use the "js" class for JavaScript code blocks.
                        // Note that only the first ("js") class will determine the language of the block when loading data.
                        {
                            language: 'javascript',
                            label: 'JavaScript',
                            class: 'js javascript js-code'
                        },

                        // Python code blocks will have the default "language-python" CSS class.
                        {
                            language: 'python',
                            label: 'Python'
                        }
                    ]
                },
                heading: {
                    options: [{
                            model: 'paragraph',
                            title: 'Paragraph',
                            class: 'ck-heading_paragraph'
                        },
                        {
                            model: 'heading1',
                            view: 'h1',
                            title: 'Heading 1',
                            class: 'ck-heading_heading1'
                        },
                        {
                            model: 'heading2',
                            view: 'h2',
                            title: 'Heading 2',
                            class: 'ck-heading_heading2'
                        }
                    ]
                }
            })
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    @this.set('description', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
