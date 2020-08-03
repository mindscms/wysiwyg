@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('frontend/js/summernote/summernote-bs4.min.css') }}">
@endsection
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">Create Post</div>

            <div class="card-body">

                <form action="{{ route('summernote_post') }}" method="post" id="form">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="post">Post</label>
                                <textarea name="post" id="summernote" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="submit" name="save" value="Save" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="{{ asset('frontend/js/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function(){
            const FMButton = function(context) {
                const ui = $.summernote.ui;
                const button = ui.button({
                    contents: '<i class="note-icon-picture"></i> ',
                    tooltip: 'File Manager',
                    click: function() {
                        window.open('/file-manager/summernote', 'fm', 'width=1400,height=800');
                    }
                });
                return button.render();
            };

            $('#summernote').summernote({
                toolbar: [
                    // [groupName, [list of button]]
                    ['Insert', ['picture', 'link', 'video', 'table', 'hr', ]],
                    ['Font Style', ['fontname', 'fontsize', 'fontsizeunit', 'color', 'forecolor', 'backcolor', 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear',]],
                    ['Paragraph style', ['style', 'ol', 'ul', 'paragraph', 'height',]],
                    ['Misc', ['fullscreen', 'codeview', 'undo', 'redo', 'help',]],

                    // your settings
                    ['fm-button', ['fm']],
                ],
                buttons: {
                    fm: FMButton
                }
            });
        });

        // set file link
        function fmSetLink(url) {
            $('#summernote').summernote('insertImage', url);
        }
    </script>
@endsection
