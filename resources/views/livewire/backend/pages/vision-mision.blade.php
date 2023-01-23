@section('pageTitle', 'Vision & Mission Page - SMK TI BAZMA')
<div>
    <div class="row row-cards">
        <div class="col-md-12 col-xl-6">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form wire:submit.prevent="autoUpdate">
                                <p>Input Text Donation</p>
                                <div wire:ignore>
                                    <textarea wire:change="content" class="form-control" name="content" id="content">{{ $content }}</textarea>
                                </div>
                                <button type="submit" wire:loading.attr="disabled"
                                    class="btn btn-primary ms-auto mt-2">Saving</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-6">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <p>Output Text</p>
                            {!! $content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@push('js')
    <script>
        ClassicEditor
            .create(document.querySelector('#content'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', ],
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
                    @this.set('content', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
