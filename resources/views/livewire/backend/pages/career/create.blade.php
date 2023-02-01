@section('pageTitle', $pageTitle . ' - SMK TI BAZMA')
<div>
    <form wire:submit.prevent="create">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card d-sm-flex d-md-none d-lg-none">
                    <div class="card-body">
                        <a href="{{ route('pages.career.index') }}" class="btn btn-yellow ms-auto">Go Back</a>
                        <button type="submit" class="btn btn-primary">Publish</button>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-8">
                <div class="row row-cards">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <label class="form-label required">Title</label>
                                <input type="text" wire:model.debounce.5000ms="name" wire:keyup.debounce.5000ms="generateSlug"
                                    class="form-control @error('name') is-invalid @enderror" name="example-text-input"
                                    placeholder="Eg: Career Example">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-hint"><span wire:model.defer="slug">{{ $slug }}</span></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <label class="form-label">Description (Optional)</label>
                                <div wire:ignore>
                                    <textarea cols="10" style="height: 300px;" wire:model.debounce.5000ms="content" class="form-control" name="content"
                                        id="content"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-4">
                <div class="row row-cards">
                    <div class="col-12">
                        <div class="card d-sm-none d-md-flex d-lg-flex">
                            <div class="card-body">
                                <a href="{{ route('pages.career.index') }}" class="btn btn-yellow ms-auto">Go Back</a>
                                <button type="submit" class="btn btn-primary">Publish</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <label class="form-label required">Image</label>
                                <input type="file" class="form-control" id="exampleInputName" wire:model="image">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div wire:loading wire:target="image">Uploading...</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <label class="form-label required">Url Deadline</label>
                                <input type="text" wire:model.debounce.5000ms="link_url"
                                    class="form-control @error('link_url') is-invalid @enderror" name="example-text-input"
                                    placeholder="Eg: {{ URL::to('/') }}">
                                <small class="form-hint">Hint: Provide the correct url, if empty (#)</small>
                                @error('link_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <label class="form-label required">Datepicker</label>
                                <input type="date" wire:model.debounce.5000ms="registration_deadline"
                                    class="form-control mb-2"
                                    placeholder="{{ Carbon\Carbon::today()->format('d/m/Y') }}"
                                    id="datepicker-default">
                                @error('registration_deadline')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
        ClassicEditor
            .create(document.querySelector('#content'), {
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
                editor.ui.view.editable.element.style.height = '250px';
                editor.model.document.on('change:data', () => {
                    @this.set('content', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function() {
            window.Litepicker && (new Litepicker({
                element: document.getElementById('datepicker-default'),
                buttonText: {
                    previousMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="15 6 9 12 15 18" /></svg>`,
                    nextMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="9 6 15 12 9 18" /></svg>`,
                },
            }));
        });
        // @formatter:on
    </script>
@endpush
