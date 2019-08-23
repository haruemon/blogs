@php $name =  $name ?? ''; @endphp
<div class="modal fade" id="modal-danger-{{ $name }}{{ $id }}" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-red">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">項目削除</h4>
            </div>
            <div class="modal-body">
                <p>本当に削除してもよろしいですか？</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">閉じる</button>
                {{ Form::submit('削除', ['class' => 'btn btn-danger']) }}
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>