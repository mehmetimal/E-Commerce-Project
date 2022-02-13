<div class="modal fade" id="site_rating" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Bizi Yorumla :)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('store.site.rating')}}" method="Post">
           @csrf
            <div class="row mb-2">
               <div class="col">
                   <label>Adınız</label>
                   <input class="form-control" type="text" name="rating_name" required>
               </div>
               <div class="col">
                   <label>Soyadınız </label>
                   <input  class="form-control" type="text" name="rating_surname" required >
               </div>
           </div>
            <div class="row mb-2">
                <div class="col">
                    <textarea name="rating_comment" cols="10" rows="10" required placeholder="Yorumunuz"></textarea>
                </div>

            </div>
            <div class="row my-2">
                <div class="col">
                    <input type="submit" class="btn btn-success" value="Yorumu Gonder !">
                </div>

            </div>
            </form>
        </div>
    </div>
</div>
