@section('pageTitle', 'Edit ' . $name .' - SMK TI BAZMA')
<div>
    <form wire:submit.prevent="update()">
        <div class="row row-cards">
            <div class="col-md-12 col-xl-8">
                <div class="row row-cards">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <label class="form-label required">Title</label>
                                <input type="text" wire:model.defer="name"
                                    class="form-control @error('name') is-invalid @enderror" name="example-text-input"
                                    placeholder="Eg: MK001">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body" wire:ignore>
                                <label class="form-label required">Description</label>
                                <textarea id="description" type="text" wire:model.defer="description"
                                    class="form-control @error('description') is-invalid @enderror"
                                    name="example-text-input" placeholder="Eg: MK001">{{ $description }}</textarea>
                                @error('description')
                                <div class="invalid-feedback" id="validatonEditor">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <label class="form-label required">Description</label>
                                <div wire:ignore>
                                    <textarea cols="10" style="height: 200px;" wire:model.defer="description"
                                        class="form-control" name="description" id="description"></textarea>
                                </div>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="col-md-12 col-xl-4">
                <div class="row row-cards">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('pages.teacher.index') }}" class="btn btn-yellow ms-auto">Go Back</a>
                                <button type="submit" class="btn btn-primary">Publish</button>
                            </div>
                        </div>
                    </div>
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
                // filebrowserUploadUrl: "{{route('uploadImageEditor', ['_token' => csrf_token() ])}}",
                // filebrowserUploadMethod: 'form',
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

                editor.ui.view.editable.element.style.height = '500px';
                editor.model.document.on('change:data', () => {
                    @this.set('description', editor.getData());
                })
                $('#validatonEditor').val(editor.getData());
                // if(!description > 0){

                // }
            })
            .catch(error => {
                console.error(error);
            });
</script>
@endpush
