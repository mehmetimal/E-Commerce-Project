{{--Category  Deteil Modal --}}
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="categoryName" class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>Kategoriye  Ait Filtreleme Değerleri   Aşağıda Listelenmiştir </h4>
                <hr>
                <div class="table-hover card-body table-responsive p-0" style="height: 300px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                        <tr class="text-center">
                            <th>Özellik No </th>
                            <th>Değer Adı</th>
                            <th>Özellik Kodu</th>
                        </tr>
                        </thead>
                        <tbody id="categoryAttributesBody">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Kapat</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



