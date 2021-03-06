<div class="modal-dialog modal-lg" role="document">
    {!! Form::open(['url' => route('jobs.update', [$data->id]), 'method' => 'post', 'files' => true]) !!}
    @method('PUT')
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Edit Lowongan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                {!! Form::label('title', 'Judul') !!}
                {!! Form::text('title', $data->title, ['class' => 'form-control', 'required', 'placeholder' => 'Web Developer', 'oninvalid' => "this.setCustomValidity('Mohon diisi dengan lengkap')", 'oninput' => "this.setCustomValidity('')"]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('type', 'Jenis Pekerjaan') !!}
                {!! Form::text('type', $data->type ?? '', ['class' => 'form-control', 'placeholder' => 'Fulltime', 'oninvalid' => "this.setCustomValidity('Mohon diisi dengan lengkap')", 'oninput' => "this.setCustomValidity('')"]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('study', 'Minimal Study') !!}
                {!! Form::text('study', $data->study ?? '', ['class' => 'form-control', 'placeholder' => 'S1/S2', 'oninvalid' => "this.setCustomValidity('Mohon diisi dengan lengkap')", 'oninput' => "this.setCustomValidity('')"]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Deskripsi') !!}
                {!! Form::textarea('description', $data->description ?? '', ['class' => 'form-control', 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('due_at', 'Deadline') !!}
                {!! Form::text('due_at', $data->due_at ?? '', ['class' => 'form-control pickadate', 'oninvalid' => "this.setCustomValidity('Mohon diisi dengan lengkap')", 'oninput' => "this.setCustomValidity('')"]) !!}
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>
<script>
    CKEDITOR.replace('description');
    $('.pickadate').pickadate({
        editable: true,
        format: 'yyyy-mm-dd'
    });
</script>