<form class="col-xs-3" id="form-task" method="post" action="save" enctype="multipart/form-data">
    <div class="form-group">
        <label for="form-name">Имя пользователя</label>
        <input type="text" class="form-control" name="name" id="form-name" placeholder="User Name" required autofocus />
    </div>
    <div class="form-group">
        <label for="form-email">E-mail</label>
        <input type="email" class="form-control" name="email" id="form-email" placeholder="Email" required />
    </div>
    <div class="form-group">
        <label for="form-text">Текст задачи</label>
        <textarea name="text" class="form-control" placeholder="Text" id="form-text" required></textarea>
    </div>
    <p>Картинка</p>
    <input type="file" name="file" id="form-photo" required />
    <input type="submit" class="btn btn-default" />
    <button id="preview" type="submit" class="btn btn-primary" data-toggle="modal">Preview</button>
</form>


<!-- Modal Popup -->
<div class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="name"></h4>
            </div>
            <div class="modal-body">
                <p id="email"></p>
                <p id="text"></p>
                <p id="photo"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" form="form-task" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="../views/js/preview.js"></script>
<script src="../views/js/handler-form.js"></script>